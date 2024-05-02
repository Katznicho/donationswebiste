<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 justify-center gap-2 my-5">

    <?php if($children->isEmpty()): ?>
        <p>No Children found</p>
    <?php else: ?>
        <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php
                // Calculate age based on date of birth
                $dob = new DateTime($child->date_of_birth);
                $now = new DateTime();
                $age = $now->diff($dob)->y;
            ?>

            <?php
                // Format date of birth to show date and month only with suffix
                $dob = new DateTime($child->date_of_birth);
                $day = $dob->format('d'); // Get the day
                $suffix = date('S', strtotime($day)); // Determine the suffix
                $formatted_dob = $dob->format('jS F'); // 'j' for day without leading zeros, 'S' for suffix, 'F' for full month name
            ?>

            <div class="w-70 h-30 flex flex-col bg-white rounded-lg shadow-md py-2 px-2">

                <div>
                    <img class="mt-5 rounded-md image" src="<?php echo e($child->profile_picture); ?>" alt="<?php echo e($child->first_name); ?>">
                </div>
                <h3 class="  w-full  text-center name"><?php echo e($child->first_name); ?>

                    <span class="age"><?php echo e($age); ?> yrs </span>
                </h3>
                <p class="text-center w-full font-sm mt-0 mb-2 born">Born <?php echo e($formatted_dob); ?></p>
                
                <p class="short text-center justify-center mx-auto px-5 leading-tight"
                    id="shortenedStory_<?php echo e($child->id); ?>"></p>
                <div id="myModal" class="modal" style="display:none;">
                    <div class="modal-content py-10 px-5">
                        <div class="upper-section border border-blue-300 relative">
                            <span class= "close-button absolute top-0 right-0 mr-5 mt-5" id="close-button"
                                onclick="Close()">&times;</span>

                            <div class="details-section">
                                <span class= "close-button absolute top-0 right-0 mr-5 mt-5" id="close-button"
                                    onclick="Close()">&times;</span>

                                <img src="<?php echo e($child->profile_picture); ?>" alt="Placeholder Image">
                                <div>
                                    <h3 id="name" class= "py-100">Name Here</h3>
                                    <p class="text-gray-600" id="dob">dob</p>
                                </div>
                            </div>

                        </div>

                        <!-- Blue border underline -->
                        <div class="mt-3 mb-3  bottom-0 left-0 w-full h-1 bg-blue-900"></div>
                        <div class="story-content">
                            <p id="storyContent">Story Content Here</p>
                        </div>
                        
                        <a href="<?php echo e(route('child.show', $child->id)); ?>" id="child_id" value=""
                            class="w-30 h-10 px-4 py-2 justify-center font-bold text-center shadow-md hover:bg-blue-700 text-white rounded-md button mt-2 mb-5 mx-auto">
                            SPONSOR
                        </a>
                    </div>
                </div>

                
                <p class="text-gray-600 text-center"><?php echo e($child->description); ?></p>
                <a href="<?php echo e(route('child.show', $child->id)); ?>" id="child_id" value="<?php echo e($child->id); ?>"
                    class="w-30 h-10  px-4 py-2 justify-center text-center font-bold shadow-md hover:bg-blue-700 text-white rounded-md mt-2 mb-5 button mx-auto">
                    SPONSOR
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>


<style>
    .age {
        color: #082652;

    }

    .button {
        background-color: #082652;

        width: 50%;
        font-size: 14px;
        /* Add rounded corners */
        /* center */
        display: block;
    }



    .age {
        color: #224F92;
        font-size: 16px;
        font-weight: normal;

    }

    .born {
        color: #224F92;

    }

    .image {
        height: 30vh;
        width: 80%;
        margin-left: 10%;


    }

    .name {
        color: #224F92;
        font-size: 16px;
        font-weight: 900;


    }

    .sponsor {
        color: white;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 10px;
        padding-bottom: 30px;

    }

    .short {

        text-align: center;
        font-size: 14px;

    }


    .tab {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid transparent;
    }

    .tab-active {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid blue;
    }

    .tab-text {
        @apply text-black;
    }

    /* Modal Styles */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 3% 6%;
        border: 1px solid #888;
        width: 80%;
        
    }

    .close-button {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-button:hover,
    .close-button:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;

        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        font-family: Arial, sans-serif;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 8px;

        max-width: 600px;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .upper-section {
        border-bottom: 2px solid #3498db;
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .details-section {
        display: flex;
        align-items: center;
        margin: 10px;
    }

    .details-section img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .details-section h3 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        color: #333;
    }

    .details-section p {
        font-size: 18px;
        color: #666;
        margin: 15px 0;
    }

    .story-content {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        margin: 0%;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {

        <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var hobby = <?php echo json_encode(str_replace(["\r\n", "\r", "\n", "\\n", "\n\n", "\n\n\n", "\n\n\n\n", "'"], '.', $child->hobby)); ?>;
            //story
            var story = <?php echo json_encode(str_replace(["\r\n", "\r", "\n", "\\n", "\n\n", "\n\n\n", "\n\n\n\n", "'"], '.', $child->story)); ?>;

          //  story = story.replace(/\.\./g, "\n"); 

         

            //pick dob
            var dob = <?php echo json_encode($child->date_of_birth); ?>;
            console.log('dob');
            console.log(dob);
            showShortenedStory(hobby, '<?php echo e($child->first_name); ?> <?php echo e($child->second_name); ?>',
                '<?php echo e($child->id); ?>', story, dob);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }); 


      

    function showShortenedStory(hobby, name, id, story, dob) {
        var words = hobby.split(' ');
        var shortenedStory = words.slice(0, 6).join(' ');
        document.getElementById('shortenedStory_' + id).innerHTML = shortenedStory +
            '&nbsp; <a href="#" id="fullStoryLink_' +
            id +
            '" class="inline-flex text-blue-900 underline justify-center  mb-5 text-sm mx-auto" onclick="showStory(\'' +
            story +
            '\', \'' + name + '\', ' + id + ', \'' + hobby + '\', \'' + dob + '\')">   Read More</a>';
    }


    function showStory(story, name, id, hobby, dob) {

        event.preventDefault();
        console.log('hehe');
        console.log(dob);
        //format dob to show yeamonth and day only
        var dob = new Date(dob);
        dob = dob.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        //create new string and concat Born to dob
        var dob_new = 'Born: ' + dob;
        document.getElementById('storyContent').innerHTML = story;
        document.getElementById('name').innerHTML = name;
        document.getElementById('myModal').style.display = 'block';
        document.getElementById('close-button').style.display = 'block';
        document.getElementById('child_id').value = id;
        // document.getElementById('hobby').innerHTML = hobby;
        document.getElementById('dob').innerHTML = dob_new;
    }

    function Close() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>
<?php /**PATH D:\Projects\Bethel Donations\dummy\dummy_new_23rd\resources\views/child/load.blade.php ENDPATH**/ ?>