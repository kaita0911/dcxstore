<!--{insert name="GetLinkDetail" cat=$view[i]  lang=$lang  assign="link" }-->
<div class="list-video col-md-3 col-sm-6 col-xs-6">
    <div class="item-video">
        <div class="thumb-video">
         <button class="icon-video" id="js-video-button_<!--{$smarty.section.i.index}-->" data-video-id='<!--{$view[i].mavideo}-->'><i class="fa fa-caret-right"></i></button>

            <img alt="<!--{$view[i].$name}-->" src="https://img.youtube.com/vi/<!--{$view[i].mavideo}-->/maxresdefault.jpg" class="img-responsive"/>
        
        </div> 
        <h3><span><!--{$view[i].$name}--></span></h3>

       
           <script>
            $("#js-video-button_<!--{$smarty.section.i.index}-->").modalVideo({
              youtube:{
                controls:0,
                nocookie: true
              }
            });
          </script>
    </div>
</div>