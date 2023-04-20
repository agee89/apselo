<?php

namespace App\Classes;

use App\Models\Config;
use Orhanerday\OpenAi\OpenAi;

class AiTools
{
    public function generate($request)
    {
        // Query
        $config = Config::get();

        // Parameters
        $open_ai_key = $config[35]->config_value;
        $open_ai = new OpenAi($open_ai_key);
        $level = (float)$request->level;
        $maxTokens = 600;
        $topP = 1.0;
        $frequencyPenalty = 0.0;
        $presencePenalty = 0.0;

        $prompt = "";

        // Check "Blog Outline"
        if ($request->type == "blog-outline") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' blog outline in ' . $request->lang . ' from a given topic "' . $request->name;
        }

        // Check "Blog Heading"
        if ($request->type == "blog-heading") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->tone . ' ' . $request->results . ' blog headings in ' . $request->lang . ' with this blog descripiton ' . $request->name;
        }

        // Check "Blog Description"
        if ($request->type == "blog-description") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' blog posts in ' . $request->lang . ' with keywords "' . $request->keywords . '" on "' . $request->name;
        }

        // Check "Blog Story Ideas"
        if ($request->type == "blog-story-ideas") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write "' . $request->name . '" ' . $request->results . ' ' . $request->tone . ' blog post in ' . $request->lang;
        }

        // Check Content creator
        if ($request->type == "content-creator") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' articles in ' . $request->lang . ' with the title "' . $request->name . '" using keywords ' . $request->keywords;
        }

        // Check paragraph creator
        if ($request->type == "paragraph-creator") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' paragraphs in ' . $request->lang . ' on the topic "' . $request->name . '" and using keywords ' . $request->keywords;
        }

        // Check "Summarization creator"
        if ($request->type == "summarization") {
            $maxTokens = (int)$request->max_length;
            $prompt = '"' . $request->tone . '" ' . $request->name . '" Write ' . $request->results . ' ' . $request->lang . ' summarization using only important words in these lines.';
        }

        // Check "Product name"
        if ($request->type == "product-name") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' product name in ' . $request->lang . ' on the product description "' . $request->name . '" and using keywords ' . $request->keywords;
        }

        // Check "Product Description"
        if ($request->type == "product-description") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' product description in ' . $request->lang . ' on the product name "' . $request->name . '" and using keywords ' . $request->keywords;
        }

        // Check "Startup"
        if ($request->type == "startup-name") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' startup / business name in ' . $request->lang . ' on the business model "' . $request->name . '" and using keywords ' . $request->keywords;
        }

        // Check "Product Review"
        if ($request->type == "product-review") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' product reviews in ' . $request->lang . ' on the store name "' . $request->name . '" and product name ' . $request->keywords;
        }

        // Check "Service Review"
        if ($request->type == "service-review") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' service reviews in ' . $request->lang . ' on the service provider name "' . $request->name . '" and service name ' . $request->keywords;
        }

        // Check "Youtube Video Title"
        if ($request->type == "youtube-title") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' youtube titles in ' . $request->lang . ' on this video description "' . $request->name;
        }

        // Check "Youtube Video Tags"
        if ($request->type == "youtube-tags") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' youtube tags in ' . $request->lang . ' on the video title "' . $request->name;
        }

        // Check "Youtube Video Outline"
        if ($request->type == "youtube-outline") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' youtube outline (introduction to conclusion) in ' . $request->lang . ' on the video title "' . $request->name;
        }

        // Check "Youtube Video Intro"
        if ($request->type == "youtube-intro") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' youtube video introduction in ' . $request->lang . ' on the channel "' . $request->name . '" and video title ' . $request->keywords;
        }

        // Check "Youtube Video Ideas"
        if ($request->type == "youtube-idea") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' video ideas in ' . $request->lang . ' on the video topic "' . $request->name;
        }

        // Check "Youtube Video Description"
        if ($request->type == "youtube-description") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' video description in ' . $request->lang . ' on the video content "' . $request->name;
        }

        // Check "Youtube Shorts Script"
        if ($request->type == "youtube-shorts") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' youtube shorts script in ' . $request->lang . ' on the title "' . $request->name;
        }

        // Check "Write for me"
        if ($request->type == "write-me") {
            $prompt = $request->tone . ' ' . $request->name . ' write and complete my unfinished sentence in ' . $request->lang;
        }

        // Check "Welcome email"
        if ($request->type == "welcome-email") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' welcome email in ' . $request->lang . ' on the service / product name "' . $request->name . '" and description ' . $request->keywords;
        }

        // Check "Website Meta Description"
        if ($request->type == "website-meta-description") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' website meta description in ' . $request->lang . ' on the website "' . $request->name . '" and using these keywords ' . $request->keywords;
        }

        // Check "Website Meta Keywords"
        if ($request->type == "website-meta-keywords") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' website meta keywords in ' . $request->lang . ' on the website meta name "' . $request->name . '" and meta description ' . $request->keywords;
        }

        // Check "Website Meta Title"
        if ($request->type == "website-meta-title") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' website meta title in ' . $request->lang . ' on the website name "' . $request->name . '" and using these keywords ' . $request->keywords;
        }

        // Check "Event Promotion Email"
        if ($request->type == "event-promotion-email") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' event promotion email in ' . $request->lang . ' on the event name "' . $request->name . '" and description ' . $request->keywords;
        }

        // Check "Twitter Writer"
        if ($request->type == "twitter-writer") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' twitter content in ' . $request->lang . ' on the topic "' . $request->name;
        }

        // Check "Aida Framework"
        if ($request->type == "aida-framework") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' Attention, Interest, Desire and Action AIDA Framework content in ' . $request->lang . ' based on this company / brand name "' . $request->name . '" and product / service ' . $request->keywords;
        }

        // Check "AI Presentation"
        if ($request->type == "presentation") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' AI presentation (ppt) content in ' . $request->lang . ' based on topic "' . $request->name;
        }

        // Check "Ask Question"
        if ($request->type == "question") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Generate ' . $request->results . ' ' . $request->tone . ' best anwsers in ' . $request->lang . ' based on question "' . $request->name;
        }

        // Check "Landing Page"
        if ($request->type == "landing-page") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' website landing page heading and description in ' . $request->lang . ' based on "' . $request->name;
        }

        // Check "Google Ads"
        if ($request->type == "google-ads") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write ' . $request->results . ' ' . $request->tone . ' best google ads heading and description in ' . $request->lang . ' based on this company / brand name "' . $request->name;
        }

        // Check "Custom Prompt"
        if ($request->type == "custom-prompt") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Write content ' . $request->results . ' in ' . $request->lang . ' based on this topic ' . $request->tone . ' "' . $request->name;
        }

        // Check "generate by website url"
        if ($request->type == "generate_by_website_url") {
            $maxTokens = (int)$request->max_length;
            $prompt = 'Use this website url '.$request->name.' to create ' . $request->lang . ' a suitable meta name, meta description and keywords.';
        }

        // Parameters
        if ($config[34]->config_value == "gpt-3.5-turbo" || $config[34]->config_value == "gpt-4") {
            $data = [
                'model' => $config[34]->config_value,
                'messages' => array(["role" => "user", "content" => $prompt]),
            ];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.openai.com/v1/chat/completions",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requesred Headers
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $open_ai_key,
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // Result
                $result = json_decode($response);

                // Check error
                if (isset($result->error)) {
                    $this->result = null;
                } else {
                    $this->result = $result->choices[0]->message->content;
                }
            }
        } else {
            $complete = $open_ai->completion([
                'model' => $config[34]->config_value,
                'prompt' => $prompt,
                'temperature' => $level,
                'max_tokens' => $maxTokens,
                'top_p' => $topP,
                "frequency_penalty" => $frequencyPenalty,
                "presence_penalty" => $presencePenalty
            ]);

            // Result
            $result = json_decode($complete);

            // Check error
            if (isset($result->error)) {
                $this->result = null;
            } else {
                $this->result = $result->choices[0]->text;
            }
        }

        return $this->result;
    }
}
