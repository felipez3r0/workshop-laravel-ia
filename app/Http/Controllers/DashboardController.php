<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Anthropic\Laravel\Facades\Anthropic;
use OpenAI\Laravel\Facades\OpenAI;
use League\CommonMark\CommonMarkConverter;

class DashboardController extends Controller
{
  public function index()
  {
    return view('dashboard');
  }

  public function chat(Request $request)
  {
    $request->validate([
      'msg' => 'required',
    ]);

    $converter = new CommonMarkConverter([
      'html_input' => 'strip',
      'allow_unsafe_links' => false,
    ]);

    $IATalk = $request->msg;
    $result = OpenAI::chat()->create([
      'model' => 'gpt-4o-mini',
      'max_tokens' => 1024,
      'messages' => [
        ['role' => 'user', 'content' => $IATalk],
      ],
    ]);

    $iaResponse = $converter->convert($result->choices[0]->message->content);

    return view('dashboard', compact('iaResponse'));
  }
}
