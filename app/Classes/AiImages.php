<?php

namespace App\Classes;

use App\Models\Config;
use Orhanerday\OpenAi\OpenAi;

class AiImages
{
    public function generate($request)
    {
        // Query
        $config = Config::get();

        // Parameters
        $open_ai_key = $config[35]->config_value;
        $open_ai = new OpenAi($open_ai_key);
        $size = $request->size;
        $results = (int)$request->results;

        // Parameters
        $complete = $open_ai->image([
            "prompt" => "Create ".$request->name." image using ".$request->style,
            "n" => $results,
            "size" => $size,
            "response_format" => "b64_json",
        ]);

        // Result
        $result = json_decode($complete);

        // Check error
        if (isset($result->error)) {
            $this->result = null;
        } else {
            $this->result = $result->data;
        }

        return $this->result;
    }
}
