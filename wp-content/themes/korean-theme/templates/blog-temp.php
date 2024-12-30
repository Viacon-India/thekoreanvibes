<?php /* Template Name: Blog Page Template */ ?>

<?php get_header(); ?>









<?php get_footer(); ?>

<script>
    var style = document.createElement('style');
    style.innerHTML = `
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(0deg, #FAC92C 0%, #EF3C23 20%);
        transition: background-color 0.3s ease; /* Smooth transition for color change */
    }
    `;
    document.head.appendChild(style);
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercentage = (scrollPosition / totalHeight) * 100;
        let thumbColor;

        if (scrollPercentage <= 25) {
            const progress = 4 * scrollPercentage;
            // if(scrollPercentage <= 12.5) {
            //     thumbColor = `linear-gradient(180deg, #EF3C23 ${100-progress}%, #FAC92C 80%)`;
            // } else {
                thumbColor = `linear-gradient(0deg, #FAC92C ${progress}%, #EF3C23 ${20+progress}%)`;
            // }
        } else if (scrollPercentage <= 50) {
            const progress = ((25/6) * scrollPercentage ) - 108.33;
            // if(scrollPercentage <= 37.5) {
            //     thumbColor = `linear-gradient(180deg, #FAC92C ${100-progress}%, #2323FF ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #2323FF ${progress}%, #FAC92C ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #2323FF ${progress}%, #FAC92C ${30+progress}%)`;
        } else if (scrollPercentage <= 75) {
            const progress = (4.1667 * scrollPercentage) - 212.5;
            // if(scrollPercentage <= 62.5) {
            //     thumbColor = `linear-gradient(180deg, #2323FF ${100-progress}%, #FF13F0 ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #FF13F0 ${progress}%, #2323FF ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #FF13F0 ${progress}%, #2323FF ${30+progress}%)`;
        } else {
            const progress = (4.1667 * scrollPercentage) - 316.67;
            // if(scrollPercentage <= 87.5) {
            //     thumbColor = `linear-gradient(180deg, #FF13F0 ${100-progress}%, #23B829 ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #23B829 ${progress}%, #FF13F0 ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #23B829 ${progress}%, #FF13F0 ${30+progress}%)`;
        }
        style.innerHTML = `
        ::-webkit-scrollbar-thumb {
            background: ${thumbColor};
            transition: background-color 0.3s ease;
        }
        `;
    });
</script>