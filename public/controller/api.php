<?php 


class ArticleFetch{

    public function send_request(){
        $url = 'https://newsapi.org/v2/everything?q=fusion&apiKey=e9690b53130944a5bae218d3390237da';

        $args = [
            'headers' => [
                'User-Agent' => 'News-Fetch/1.0'
            ]
        ];

        $response = wp_remote_get($url, $args);

        if(is_wp_error($response)){
            $err_msg = $response->get_error_message();
            echo "Error occured during fetch: $err_msg";
        }

        return $response;
        //handle errors
    }

    public function display_hello_world(){
        echo "hello world";
    }

    public function display_data(){
        $response = $this->send_request();

        $results = json_decode(wp_remote_retrieve_body($response));

        $html='<html>';
        $html .='<p><b>Status: '.$results->status.'</b><p>';
        $html .='<p><b>Total Results: '.$results->totalResults.'</b><p><br>';
        $html .='<table>';
        $html .='<tr>';
        $html .='<td><b>Source</b></td>';
        $html .='<td><b>Author</b></td>';
        $html .='<td><b>Title</b></td>';
        $html .='<td><b>Content</b></td>';
        $html .='<td><b>Image</b></td>';
        $html .='</tr>';

        // foreach($results->articles as $article){
        //     echo $article[0];
        // }
        

        

        foreach($results->articles as $result)
        {
            $html .='<tr>';
            $html .='<td>'.$result->source->name.'</td>';
            $html .='<td>'. $result->author.'</td>';
            $html .='<td>'.$result->title.'</td>';
            $html .='<td>'.$result->content.'</td>';
            $html .='<td><img width=250px height=250px src='.$result->urlToImage.' /></td>';
        
            $html .='</tr>';


        }
        $html .= '</table>';

        return $html;
        // echo $response['body'];
    }
}

?>