

<script>
function toggleTab(tabId) {
 

    //route to child tab
    if (tabId === 'tab2') {
       
        window.location.href = "<?php echo e(route('child.index')); ?>";
        //,ake
    }

    else if (tabId === 'tab3') {
        window.location.href = "<?php echo e(route('mother.index')); ?>";
    }

    else {
        window.location.href = "<?php echo e(route('home')); ?>";
    }

    


}
</script>



<?php /**PATH /home/codeartisan/Desktop/laravelapps/dummy3/dummy2/resources/views/components/tabs.blade.php ENDPATH**/ ?>