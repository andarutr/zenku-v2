<div class="card mb-4">
    <div class="card-header bg-primary">
        <h4 class="m-0 text-white">{{ $materi->title_card }}</h4>
    </div>
    <div class="card-body p-5">
        <center>
            <div style="padding:1px;background:#000;webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;width:560px;margin:0 auto;overflow:hidden;">
                <iframe width="560" height="315" src="{{ $materi->video_card }}" title="{{ $materi->title_card }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </center>
        <div class="mt-4">
            <h5><span class="badge bg-primary p-2 text-white">{{ $materi->category }}</span></h5>
            <?php echo $materi->description; ?>
        </div>
    </div>
</div>