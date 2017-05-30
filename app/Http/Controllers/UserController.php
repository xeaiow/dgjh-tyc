<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Member;
use App\Attend;
use App\AttendBook;

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

        $member = AttendBook::all();

        return view('admin.attendLists')->with('user', $member);
    }

    // 點名內清單
    public function attendInfo (Request $request)
    {

        $info = Attend::select('attend.*', 'member.firstname', 'member.numbers', 'member.class_id', 'attend_book.title')->join('member', 'attend.username', 'member.id')->join('attend_book', 'attend.groups', 'attend_book.id')->where('groups', '=', $request->id)->get();

        return view('admin.attendInfo')->with('info', $info);
    }
}
