<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\CreateAttendRequest;
use App\Member;
use App\Attend;
use App\AttendBook;
use App\Insurance;
use App\Activity;

class UserController extends Controller
{

    public function index()
    {
        $user = Member::select('*')->where('status', '=', 0)->get();
        return view('admin.lists')->with('user', $user);
    }

    // 關於
    public function about () {
        return view('admin.about');
    }


    // 新增使用者頁面
    public function create()
    {
        return view('admin.create');
    }

    // 新增使用者
    public function createHandle (CreateRequest $request)
    {
        $new = [
            'class_id' => $request->class_id,
            'numbers' => $request->numbers,
            'firstname' => $request->firstname,
            'birthday' => $request->birthday,
            'identity_id' => $request->identity_id,
            'guardian' => $request->guardian,
        ];

        if (!Member::create($new)) {

            return "fail";
        }
        return redirect('admin'); // 導到管理員列表
    }

    // 編輯使用者頁面
    public function edit(Request $request)
    {
        $member = Member::find($request->id);
        return view('admin.edit')->with('user', $member);
    }

    // 編輯使用者
    public function editHandle (EditRequest $request)
    {
        $member = Member::find($request->id);
        $member->class_id = $request->class_id;
        $member->numbers = $request->numbers;
        $member->firstname = $request->firstname;
        $member->birthday = $request->birthday;
        $member->guardian = $request->guardian;
        $member->save();

        return redirect('admin');
    }

    // 刪除使用者
    public function removeHandle (Request $request)
    {
        $member = Member::find($request->id);
        $member->status = 1;
        $member->save();

        return redirect('admin');
    }

    // 點名冊
    public function checkin ()
    {
        $member = Member::select('*')->where('status', '=', 0)->get();
        return view('admin.check_in')->with('info', $member);
    }

    // 搜尋使用者
    public function searchHandle (Request $request)
    {
        $keywords = $request->search;

        $search_user = Member::where('firstname', 'like', '%' .$keywords. '%')
        ->orWhere('identity_id', 'like', '%' .$keywords. '%')
        ->orWhere('guardian', 'like', '%' .$keywords. '%')
        ->get();

        if (!$search_user) {
            return "Not found users.";
        }
        return view('admin.lists')->with('user', $search_user);
    }

    // 所有點名
    public function attend ()
    {

        $member = AttendBook::orderBy('id', 'DESC')->paginate(2);
        if (!$member) {
            echo "not found";
        }

        return view('admin.attendLists')->with('user', $member);
    }

    // 點名內清單
    public function attendInfo (Request $request)
    {

        $info = Attend::select('attend.*', 'member.firstname', 'member.numbers', 'member.class_id', 'attend_book.title', 'attend_book.description')->join('member', 'attend.username', 'member.id')->join('attend_book', 'attend.groups', 'attend_book.id')->where('groups', '=', $request->id)->get();

        return view('admin.attendInfo')->with('info', $info);
    }

    // 新增點名單頁面
    public function createAttend ()
    {

        $member = Member::where('status', '=', 0)->get();

        return view('admin.createAttend')->with('user', $member);
    }

    // 新增點名單
    public function createAttendHandle (CreateAttendRequest $request)
    {
        // 統計應到人數與實到人數
        $attended = 0;
        for ($j = 0; $j < count($request->record); $j++) {
            if ($request->record[$j] == 0) {
                $attended++;
            }
        }

        $new = [
            'title' => $request->title,
            'description' => $request->description,
            'quorum' => count($request->record),
            'attended' => $attended,
            'start' => $request->start,
            'end' => $request->end,
        ];

        $attend = AttendBook::create($new);

        if (!$attend) {
            return "fail";
        }

        // 取得所有使用者資料
        $member = Member::where('status', '=', 0)->get();

        for ($i = 0; $i < count($request->record); $i++) {

            $attend_book = [
                'groups' => $attend->id,
                'username' => $member[$i]->id,
                'record' => $request->record[$i],
            ];
            if (!Attend::create($attend_book)) {
                return "failed";
            }
        }

        return redirect('admin/attend'); // 導到點名單紀錄列表
    }

    // 總紀錄
    public function totalLists ()
    {

        $info = Member::where('status', '=', 0)->get();
        $AttendBook = AttendBook::all();
        $Attend = Attend::all();
        $student_id = [];

        for ($i = 0; $i < count($info); $i++) {
            $student_id[$i] = $info[$i]->id;
        }

        $array = array(
            'member' => $info,
            'attend_book' => $AttendBook,
            'attend' => $Attend,
            'student_id' => $student_id,
        );

        return view('admin.totalLists')->with('info', $array);
    }

    // 保險冊列表
    public function insurance ()
    {

        $insurance = Activity::all();

        if (!$insurance) {
            echo "not found";
        }

        return view('admin.insuranceLists')->with('info', $insurance);
    }

    // 保險冊單筆活動資料
    public function insuranceInfo (Request $request)
    {
        $insuranceInfo = Insurance::select('insurance.*', 'member.class_id', 'member.numbers', 'member.firstname', 'member.birthday', 'member.identity_id', 'member.guardian', 'member.vegetarianism', 'member.status')->join('member', 'insurance.users', 'member.id')->where('groups', $request->id)->get();

        return view('admin.insuranceInfo')->with('info', $insuranceInfo);
    }
}
