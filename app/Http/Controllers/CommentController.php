<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notification;
use App\Question;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function add(Request $request, $id)
    {

    	$this->validate($request, [
            'comment_body' => 'required|string|max:400',
        ]);

        //dd($request);

        $comment = new Comment();

        $question = Question::find($id);

        $comment->question_user_id = $question->user_id;

        $comment->comment_user_id = Auth::user()->id;

        $comment->category_id = $question->category_id;
        $comment->question_id = $question->id;
        $comment->comment_body = $request->comment_body;
        $comment->save();


        if ($question->user_id != Auth::id()) {
            $notification = new Notification();
            $notification->notification_type = 'Comment';
            $notification->user_id = Auth::id();
            $notification->notification_user_id = $question->user_id;
            $notification->question_id = $id;
            $notification->comment_id = $comment->id;
            $notification->save();
        }

        $notifications = Notification::where([['notification_type','Comment'],['question_id',$question->id]])->get();

        if ($notifications != null) {
                foreach ($notifications as $key => $value) {
                    if($value->user_id != Auth::id()) {  
                        $cnotification = Notification::where([['notification_type','Comment Comment'],['question_id',$question->id],['comment_id',$comment->id],['user_id',Auth::id()],['notification_user_id',$value->user_id]])->first();
                        if ($cnotification == null) {
                            $notification = new Notification();
                            $notification->notification_type = 'Comment Comment';
                            $notification->user_id = Auth::id();
                            $notification->notification_user_id = $value->user_id;
                            $notification->question_id = $id;
                            $notification->comment_id = $comment->id;
                            $notification->save();
                        }
                    }
             }
        }


        return redirect(route('guestView', $question->id));
    }


    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comment', compact('comment'));
    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'comment_body' => 'required|string|max:400',
        ]);

    	$comment = Comment::find($id);

    	//dd($comments);

    	$comment->comment_body = $request->comment_body;

        $comment->save();

    	return redirect(route('guestView', $comment->question_id));
    }


    public function delete($id)
    {

        Notification::where('comment_id',$id)->delete();

    	Comment::find($id)->delete();

    	//dd($comments);

    	return redirect()->back();

    }    
    public function viewCommentlist()
    {
    	$comments = Comment::all()->where('comment_user_id', Auth::user()->id);

    	//dd($comments);

    	return view('user.commentlist', compact('comments'))->with('no', 1);
    }

    public function viewcomment($id)
    {
    	$comment = Comment::find($id);

    	//dd($comments);

    	return view('user.viewcomment', compact('comment'));
    }

    public function editcomment($id)
    {

    	$comment = Comment::find($id);

    	//dd($comments);

    	return view('user.editcomment', compact('comment'));
    }

    public function updatecomment(Request $request, $id)
    {

    	$this->validate($request, [
            'comment_body' => 'required|string|max:400',
        ]);

    	$comment = Comment::find($id);

    	//dd($comments);

    	$comment->comment_body = $request->comment_body;

        $comment->save();

    	return redirect(route('user.commentlist'))->with('successMsg', 'Comment successfully updated.');
    }

    public function deletecomment($id)
    {
    	Comment::find($id)->delete();

    	//dd($comments);

    	return redirect()->back()->with('successMsg', 'Comment successfully deleted.');
    }

}
