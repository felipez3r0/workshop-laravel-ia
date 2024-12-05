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

    //$IATalk = 'Você é um professor e está criando exercícios sobre o seguinte tema:' . $request->msg . '. Crie um enunciado para um exercício sobre esse tema.';
    $IATalk = $request->msg;
    $result = OpenAI::chat()->create([
      'model' => 'gpt-4o-mini',
      'max_tokens' => 1024,
      'messages' => [
        ['role' => 'system', 'content' => 'Você é um professor e está criando exercícios sobre o seguinte tema:'],
        ['role' => 'user', 'content' => $IATalk],
      ],
    ]);

    $iaResponse = $converter->convert($result->choices[0]->message->content);

    return view('dashboard', compact('iaResponse'));
  }
}
