<div class="buttons-social-media-share">
            <ul class="share-buttons">
              <li>
                  <a 
                    href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&t={{ $description }}" 
                    title="Compartir en Facebook" 
                    target="_blank">
                    <img alt="Share on Facebook" src="{{asset('img/flat_icons/Facebook.svg')}}" style="width: 25px;">
                  </a>
              </li>
              <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via={{ config('app.name')}}&hashtags={{ config('app.name')}}" target="_blank" title="Tweet"><img alt="Tweet" src="{{asset('img/flat_icons/Twitter.svg')}}" style="width: 25px;"></a></li>
            </ul>
</div>