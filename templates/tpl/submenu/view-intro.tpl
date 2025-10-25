         
    <div class="main">
            <div class="productbreadcrumb">
                <div class="container">
                    <ul>
                        <li>
                            <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                        </li>
                        <!--{$linkTitle}-->
                    </ul>
                </div>
             </div>  
            <div class="clearfix"></div>   
            <div class="content">
                
                <div class="artseed-ftn-body">
                    <div class="section1">
                        <div class="container">
                            <div class="title_intro"><h1><!--{$seo.$name}--></h1></div>
                            <div class="row">
                                <div class="img_sec1 col-md-6 col-sm-6 col-xs-12">
                                     <img src="<!--{$path_url}-->/<!--{$nameintromk.img_vn}-->" alt="<!--{$nameintromk.alt_img}-->" class="img-responsive"/>
                                </div>
                                <div class="info_sec1 col-md-6 col-sm-6 col-xs-12">

                                    <!--{$intromk.$content}-->
                                </div>
                            </div>
                        </div>
                    </div><!--sec 1-->
                    <div class="section2">
                       
                            <div class="content">
                            <div class="title_intro"><h2><!--{$nametrietly.$name}--></h2></div>
                            <!--{$trietly.$content}-->
                            </div>
                        
                    </div><!--sec 2-->
                    <div class="section3">
                        <div class="container">
                            <div class="title_intro"><h2><!--{$nametamnhin.$name}--></h2></div>
                            <div class="row">
                            <!--{section name=i loop=$tamnhin}-->
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item">
                                        <p class="img"> <img src="<!--{$path_url}-->/<!--{$tamnhin[i].img_vn}-->" alt="<!--{$tamnhin[i].alt_img}-->" class="img-responsive"/></p>
                                        <div class="meta">
                                            <h3><!--{$tamnhin[i].$name}--></h3>
                                            <div class="sdes"><!--{$tamnhin[i].$content}--></div>
                                        </div>
                                    </div>
                                </div>

                            <!--{/section}-->
                            </div>
                        </div>
                    </div><!--sec 3-->
                </div><!--contentduan-->
                </div>
       
    </div><!--main-->
    <div class="clearfix"></div>
