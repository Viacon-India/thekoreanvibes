<?php /* Template Name: Write For Us Template */ ?>

<?php get_header(); ?>



<section class="write-for-us bg-[#FEF3F3]">
    <div class="container mx-auto">

        <div class="flex flex-col max-w-[750px] mx-auto">
            <h1 class="write-for-us-title">
                WRITE FOR US
            </h1>

            <p class="write-for-us-dsc">
                We are very enthusiastic about the things we do here. We understand what
                our readers need and ensure that they get that. We don’t play games with the quality
                of the articles and ensure that every article is consistent. If you think you have
                something worth sharing with our readers, we will certainly accept you as our
                valued contributor. However, there are certain things you need to consider before
                while gusset posting on 7bestthings.com. Given below are the Guest Post Guidelines
                that need to be followed.
            </p>

            <div class="guidelines-wrapper mt-[28px]">
                <h2 class="guidelines-title">
                    Contributor’s Guidelines
                </h2>

                <ul class="guidelines-ul ">
                    <li class="guidelines-ul-li">
                        You need to be Well Versed in the niche you are writing for.
                    </li>
                    <li class="guidelines-ul-li">
                        You need to be Well Versed in the niche you are writing for.
                    </li>
                    <li class="guidelines-ul-li">
                        You need to be Well Versed in the niche you are writing for.
                    </li>
                    <li class="guidelines-ul-li">
                        You need to be Well Versed in the niche you are writing for.
                    </li>
                    <li class="guidelines-ul-li">
                        You need to be Well Versed in the niche you are writing for.
                    </li>
                </ul>

                <p class="guidelines-p">
                    We believe that one qualitative content is equivalent to hundred regular contents. Hence, we expect that you provide us with
                    high-quality content. High-quality content is perfectly SEO (Search Engine Optimization) optimized. You can use the following checklist
                    to ensure that your article is SEO optimized.
                </p>

                <ul class="guidelines-ul">
                    <li class="guidelines-ul-li">
                        The Word count shouldn’t be less than 1000 words. If you want,
                        you can further exceed the word count to make your article more information descriptive.
                    </li>
                    <li class="guidelines-ul-li">
                        The Title of the article must be between 50-60 characters.
                    </li>
                    <li class="guidelines-ul-li">
                        Use Bullets to make your points clear.
                    </li>
                    <li class="guidelines-ul-li">
                        Brush up the Grammatical Errors.
                    </li>
                    <li class="guidelines-ul-li">
                        Add Relevant Images. Also, avoid using images that can claim copyrights.
                    </li>
                </ul>

                <p class="guidelines-p mt-[37px]">
                    NOTE: You can only have No-Follow backlinks; however, if you want Do-Follow Backlinks, Contact Us to let us know.
                </p>

            </div>
        </div>
    </div>
</section>

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