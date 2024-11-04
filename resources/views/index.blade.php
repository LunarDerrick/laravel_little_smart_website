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
    <section id="news">
        <div class="container rounded-3 bg-body mt-4 mx-auto">
            <div class="row py-2">
                <h1><span>ANNOUNCEMENT</span></h1>
            </div>
            <div class="row py-2 px-4">
                <table>
                    <tr>
                        <td>27-10-2024</td>
                        <td>Upcoming Preparations for UASA: What is to be expected</td>
                    </tr>
                    <tr>
                        <td>09-09-2024</td>
                        <td>Notice of Closure: Deepavali Holiday</td>
                    </tr>
                    <tr>
                        <td>31-08-2024</td>
                        <td>Happy Merdeka to Everyone! A Warm Greetings from Little Smart</td>
                    </tr>
                </table>
            </div>
            <div class="row py-2 pe-4">
                <a href="#">Older post...</a>
            </div>
        </div>
    </section>

    {{-- middle 2 section --}}
    <section id="about">
        <div class="container mt-4 ">
            <div class="row">
                <h1><span>WHY CHOOSE US?</span></h1>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-md-3 rounded-3 bg-body flex-grow px-0 ms-md-0 position-relative">
                    <img src="{{ asset('media/cat.png') }}" class="deco left" alt="cat">
                    <div class="rounded-top-3 clip">
                        <img src="{{ asset('media/classmates.jpg') }}" alt="..." />
                    </div>
                    <div class="row px-4 pt-3"><h4>Friendly Classmates</h4></div>
                    <div class="row px-4 py-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
                <div class="col-md-3 rounded-3 bg-body flex-grow px-0 mx-md-4 my-3 my-md-0 position-relative">
                    <img src="{{ asset('media/penguin.png') }}" class="deco middle" alt="penguin">
                    <div class="rounded-top-3 clip">
                        <img src="{{ asset('media/teachers.jpg') }}" alt="..." />
                    </div>
                    <div class="row px-4 pt-3"><h4>Good Teachers</h4></div>
                    <div class="row px-4 py-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
                <div class="col-md-3 rounded-3 bg-body flex-grow px-0 me-md-0 position-relative">
                    <img src="{{ asset('media/dog.png') }}" class="deco right" alt="dog">
                    <div class="rounded-top-3 clip">
                        <img src="{{ asset('media/classroom.jpg') }}" alt="..." />
                    </div>
                    <div class="row px-4 pt-3"><h4>Clean Classrooms</h4></div>
                    <div class="row px-4 py-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <a href="#">Learn more in <b>About Us</b></a>
            </div>
        </div>
    </section>
    {{-- bottom section --}}
    <section>
        @include('components.alert_notification')
        @include('components.no_records')
    </section>

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
