
<?php
$this->session->set_userdata('last_page',current_url());
?>
<section class="fullwidth margin-top-0" data-background-color="#fff" style="background: rgb(255, 255, 255);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-55">
					<strong class="headline-with-separator"><?=$page_title;?></strong>
				</h3>
				<a href="<?=base_url('admin/blog_create');?>" class="button gray">Add Blog</a>
			</div>
		</div>
		<div class="row">

<!-- Listings -->
			<div class="col-lg-12 col-md-12">
								<div class="table-responsive">
<table class="table table-striped table-hover" id="tableExport">
        <thead>
            <tr>
                <th>Seq.</th>
                <th>Title</th>
                <th>Img</th>
                <th>Short Note</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
$i=0;
foreach ($blogs as $blog) {
	if($blog['row_status']==1){
									$status=2;
									$status_type='Inactive';
								}elseif($blog['row_status']==2){
									$status=1;
									$status_type='Active';
								}
?>
            <tr>
                <td><?=$i+1;?></td>
                <td><?=$blog['title']?></td>
                <td><img src="<?=base_url('uploads/blogs/').$blog['id'].'.jpg';?>" alt=""></td>
                <td><?=$blog['short_note'];?></td>
                <td><?=date('M d,Y',strtotime($blog['created_at']));?></td>
                <td>
					<a href="<?=base_url('admin/blog_edit?blog_title=').$blog['title'].'&blog='.$blog['id'];?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
					<a href="<?=base_url('set_row_status/blogs/id/').$blog['id'].'/'.$status?>" class="button gray"><?=$status_type;?></a>
					<a href="<?=base_url('blog?title='.$blog['title'].'&blog='.$blog['id'].'&created='.$blog['created_at']);?>" class="button gray" target="_blank">View</a>
                </td>
            </tr>
        <?php $i++;}?>
        </tbody>
    </table>
</div>
				<!-- <div class=" margin-top-0">
					
<?php
$i=0;
foreach ($blogs as $blog) {
?>
					<div class="col-md-4">
						<?php
								if($blog['row_status']==1){
									$status=2;
									$status_type='Inactive';
								}elseif($blog['row_status']==2){
									$status=1;
									$status_type='Active';
								}
								?>
							<a href="<?=base_url('admin/blog_edit?blog_title=').$blog['title'].'&blog='.$blog['id'];?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
							<a href="<?=base_url('set_row_status/listings/id/').$blog['id'].'/'.$status?>" class="button gray"><?=$status_type;?></a>	
						
				<a href="<?=base_url('blog?title='.$blog['title'].'&blog='.$blog['id'].'&created='.$blog['created_at']);?>" target="_blank">
					<div class="blog-compact-item">
						
						<img src="<?=base_url('uploads/blogs/').$blog['id'].'.jpg';?>" alt="">
						
						
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li><?=date('d M Y',strtotime($blog['created_at']));?></li>
							</ul>
							<h3><?=ucwords($blog['title']);?></h3>
							<p><?=$blog['short_note'];?></p>
						</div>
					</div>
				</a>
			</div>
			<?php $i++;}?>
					<ul>
					</ul>
				</div> -->
			</div>

		</div>

	</div>
</section>
			

