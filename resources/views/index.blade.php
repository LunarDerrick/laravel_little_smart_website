<!DOCTYPE html>
<html lang="en">

<head>
    <title>Little Smart Day Care Centre</title>

    @include('components.header')
    {{-- <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script> --}}
</head>

<body>
    @include('components.navbar')
    {{-- top section --}}
    <div class="hero-section">
        <img src="{{ asset('media/group_photo_2.jpg') }}" alt="day care group photo" />
        <div class="overlay">
            <h1 class="large-text en"><span>
                Little Smart Day Care Centre
            </span></h1>
            <p class="large-text en">
                Our aim is to nurture self-improvement, provide great teachers, and prepare pleasant environment for the children.
            </p>
            <h1 class="large-text ch hidden"><span>
                小聪明安亲班
            </span></h1>
            <p class="large-text ch hidden">
                我们的宗旨是帮助孩子提升自己，提供好的老师和协助家长一起给孩子快乐地长大。
            </p>
        </div>
    </div>
    <div class="divider"></div>

    {{-- middle 1 section --}}
    <section>
        @include('components.alert_notification')
        @include('components.no_records')
    </section>
    {{-- middle 2 section --}}
    <section></section>
    {{-- bottom section --}}
    <section></section>

    {{-- @include('components.send_feedback') --}}
    @include('components.footer')
    @include('components.font-check')

    <!-- Handle customised title & slogan -->
    <script>
        function toggleLanguage(lang) {
            const enElements = document.querySelectorAll('.en');
            const chElements = document.querySelectorAll('.ch');

            if (lang === 'en') {
                enElements.forEach(el => el.classList.remove('hidden'));
                chElements.forEach(el => el.classList.add('hidden'));
            } else if (lang === 'ch') {
                chElements.forEach(el => el.classList.remove('hidden'));
                enElements.forEach(el => el.classList.add('hidden'));
            }
        }

        const targetNode = document.documentElement;
        const config = { attributes: true };

        const callback = function(mutationsList) {
            for (const mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'lang') {
                    const currentLang = targetNode.lang;
                    if (currentLang === 'zh-CN') {
                        toggleLanguage('ch');
                    } else {
                        toggleLanguage('en');
                    }
                }
            }
        };

        const observer = new MutationObserver(callback);
        observer.observe(targetNode, config);
    </script>
</body>

</html>
