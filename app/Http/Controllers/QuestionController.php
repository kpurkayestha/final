<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Notification;
use App\Question;
use App\Questionvote;
use App\User;
use App\Vote;
use Auth;
use DB;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function blogQuestionList()
    {
        $questions = Question::orderby('created_at','desc')->paginate(5);
        $recentquestions = Question::orderby('created_at','desc')->limit('5')->get();
        $categories = Category::all();
        
        //$comments = Comment::all();

     
        
        return view('blog', compact('questions', 'categories','recentquestions'));
    }

    public function viewQuestionList()
    {
        $questions = Question::all()->where('user_id', Auth::user()->id);
        return view('user.questionlist', compact('questions'))->with('no',1);
    }

    public function addQuestion()
    {
    	$categories = Category::all();
        return view('user.addquestion', compact('categories'));
    }
    public function storeQuestion(Request $request)
    {
        //


        $this->validate($request, [
            'category_id' => 'required|Integer',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        //dd($request);

        $question = new Question();
        
        $question->user_id = Auth::user()->id;
        $question->category_id = $request->category_id;
        $question->title = $request->title;
        $question->description = $request->description;
        

        $question->save();

        $vote = new Vote();
        $vote->question_id = $question->id;
        $vote->save();

        return redirect(route('user.questionlist'))->with('successMsg', 'Question Successfully Posted.');

    }

    public function showQuestion($id)
    {
        //
        $question = Question::find($id);
        return view('user.viewquestion', compact('question'));
    }

    public function editQuestion($id)
    {
        $categories = Category::all();

    	$question = Question::find($id);
        return view('user.editquestion', compact('question','categories'));
    }

    public function updateQuestion(Request $request, $id)
    {
    	$this->validate($request,[
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $question = Question::find($id);
        
        $question->category_id = $request->category_id;
        $question->title = $request->title;
        $question->description = $request->description;
        
        $question->save();
        return redirect(route('user.questionlist'))->with('successMsg','Question Successfully Updated');
    }

    public function deleteQuestion($id)
    {
        //dd($id);

        Vote::where('question_id',$id)->delete();
        Questionvote::where('question_id',$id)->delete();
        Notification::where('question_id',$id)->delete();

    	Question::find($id)->delete();
        return redirect()->back()->with('successMsg', 'Question Successfully Deleted');
    }
    
    public function guestView($id)
    {
        //dd($id);
        $question = Question::find($id);

        $comments = Comment::all()->where('question_id', $id);

        //dd($comments);

        return view('view', compact('question', 'comments'));
    }

    public function categoryView($id)
    {
        //dd($id);
        
        $category = Category::find($id);
        
        //$questions = Question::orderby('created_at','desc')->paginate(5);

        $questions = Question::where('category_id', $id)->paginate(2);
        
        //dd($questions);
        //dd($category);
        
        return view('categoryview', compact('questions', 'category'));
    }

    public function edit($id)
    {
        $categories = Category::all();

        $question = Question::find($id);
        return view('edit', compact('question','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $question = Question::find($id);
        
        $question->category_id = $request->category_id;
        $question->title = $request->title;
        $question->description = $request->description;
        
        $question->save();
        return redirect(route('guestView', $id));
    }

    public function delete($id)
    {
        Question::find($id)->delete();
        return redirect(route('blog'))->with('successMsg', 'Question Successfully Deleted');
    }

    public function likequestion($id)
    {   
        if (Auth::user()->ban == 0) {
            $question = Question::find($id);
        $questionlike = Questionvote::where([['user_id',Auth::id()],['question_id',$id],['status','like']])->first();
    
        if ($questionlike == null) {
            $questiondislike = Questionvote::where([['user_id',Auth::id()],['question_id',$id],['status','dislike']])->first();

            $vote = Vote::where('question_id',$id)->first();  

            if ($questiondislike !=  null) {
                $questiondislike->delete();
                Notification::where([['notification_type','Dislike'],['user_id',Auth::id()],['notification_user_id',$question->user_id],['question_id',$id]])->delete();

                $dislike = $vote->dislike;
                $dislike = $dislike - 1;
                $vote->dislike = $dislike; 
            }

            $questionvote = new Questionvote();
            $questionvote->user_id = Auth::id();
            $questionvote->question_id = $id;
            $questionvote->status = 'like'; 
            $questionvote->save();

            $notification = new Notification();
            $notification->notification_type = 'Like';
            $notification->user_id = Auth::id();
            $notification->notification_user_id = $question->user_id;
            $notification->question_id = $id;
            $notification->save();

            $like = $vote->like;
            $like = $like + 1;
            $vote->like = $like;

            $vote->save();


        }

        }


        return redirect()->back();
    }


    public function dislikequestion($id)
    {   
        if (Auth::user()->ban == 0) {
            $question = Question::find($id);
        $questiondislike = Questionvote::where([['user_id',Auth::id()],['question_id',$id],['status','dislike']])->first();
        
        if ($questiondislike == null) { 
            $questionlike = Questionvote::where([['user_id',Auth::id()],['question_id',$id],['status','like']])->first();

            $vote = Vote::where('question_id',$id)->first();  

            if ($questionlike !=  null) {
                $questionlike->delete();
                Notification::where([['notification_type','Like'],['user_id',Auth::id()],['notification_user_id',$question->user_id],['question_id',$id]])->delete();

                $like = $vote->like;
                $like = $like - 1;
                $vote->like = $like; 
            }

            $questionvote = new Questionvote();
            $questionvote->user_id = Auth::id();
            $questionvote->question_id = $id;
            $questionvote->status = 'dislike'; 
            $questionvote->save();

            $notification = new Notification();
            $notification->notification_type = 'Dislike';
            $notification->user_id = Auth::id();
            $notification->notification_user_id = $question->user_id;
            $notification->question_id = $id;
            $notification->save();

            $dislike = $vote->dislike;
            $dislike = $dislike + 1;
            $vote->dislike = $dislike;

            $vote->save();


        }
        }

        return redirect()->back();
    }

}
