
<br>
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6"><?php echo $post->author; ?></h1>

        <div class="bg-white rounded p-4 shadow-md">
            <p class="text-lg font-bold mb-2"><?php echo $post->title; ?></p>
            <p class="mb-4"><?php echo $post->content; ?></p>
            <br>
            <p >datum created: <?php echo $post->datum; ?></p>
            <p class="mb-4">slug: <?php echo $post->slug; ?></p>
        </div>
    </div>