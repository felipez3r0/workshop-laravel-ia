<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Anthropic\Laravel\Facades\Anthropic;
use OpenAI\Laravel\Facades\OpenAI;

class DashboardController extends Controller
{
    public function index()
    {
        $IATalk = "Qual a versão atual do Laravel?";

        // $result = Anthropic::messages()->create([
        //     'model' => 'claude-3-haiku-20240307',
        //     'max_tokens' => 1024,
        //     'messages' => [
        //       ['role' => 'user', 'content' => $IATalk]
        //     ],
        //   ]);
        $result = OpenAI::chat()->create([
          'model' => 'gpt-4o-mini',
          'max_tokens' => 1024,
          'messages' => [
              ['role' => 'user', 'content' => $IATalk],
          ],
        ]);

        //echo nl2br($result->content[0]->text);
        $iaResponse = nl2br($result->choices[0]->message->content);

        return view('dashboard', compact('iaResponse'));
    }
}
