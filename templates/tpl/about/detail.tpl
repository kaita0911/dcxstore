<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='../breadcumb.tpl'}</div>
      <div class="row">
         <!-- Sidebar left -->

         <h1 itemprop="headline">{$detail.name}</h1>
         <!-- Main content -->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
               <h1 itemprop="headline">{$detail.name}</h1>
            </div>

            <div class="pagewhite" itemprop="articleBody">
               <div class="artseed-detail-content">
                  {$detail.short}
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <!-- /.artseed-ftn-body -->

      </div>
   </div>
</div>