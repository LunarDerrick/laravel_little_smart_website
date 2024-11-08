<!DOCTYPE html>
<html lang="en">

<head>
    <title>Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

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

    {{-- @include('components.no_records') --}}
    <section id="news">
        <div class="container rounded-3 bg-body mt-4 mx-auto">
            <div class="row py-2">
                <h1><span>ANNOUNCEMENT</span></h1>
            </div>
            <div class="row py-2 px-4">
                @if ($posts->isEmpty())
                    @include('components.no_records')
                @else
                    <table>
                        <colgroup>
                            <col id="date">
                            <col id="title">
                        </colgroup>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->createdtime->format('d-m-Y') }}</td>
                                <td>{{ $post->title }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
            <div class="row py-2 pe-4">
                <a href="{{ route('news') }}">Older post...</a>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container mt-4">
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
                        Our daycare fosters a friendly, supportive environment where students help
                        each other learn and form lasting friendships. During holidays, they also
                        enjoy non-academic classes that promote community and fun.
                    </div>
                </div>
                <div class="col-md-3 rounded-3 bg-body flex-grow px-0 mx-md-4 my-3 my-md-0 position-relative">
                    <img src="{{ asset('media/penguin.png') }}" class="deco middle" alt="penguin">
                    <div class="rounded-top-3 clip">
                        <img src="{{ asset('media/teachers.jpg') }}" alt="..." />
                    </div>
                    <div class="row px-4 pt-3"><h4>Good Teachers</h4></div>
                    <div class="row px-4 py-3">
                        Our team of dedicated educators includes experienced primary school teachers
                        working part-time alongside university students, all committed to providing
                        quality care and learning in our 3 classrooms.
                    </div>
                </div>
                <div class="col-md-3 rounded-3 bg-body flex-grow px-0 me-md-0 position-relative">
                    <img src="{{ asset('media/dog.png') }}" class="deco right" alt="dog">
                    <div class="rounded-top-3 clip">
                        <img src="{{ asset('media/classroom.jpg') }}" alt="..." />
                    </div>
                    <div class="row px-4 pt-3"><h4>Clean Classrooms</h4></div>
                    <div class="row px-4 py-3">
                        Our classrooms are organized by age groups 7-8, 9-10, and 11-12; ensuring
                        age-appropriate learning experiences. A spacious lobby provides a relaxing
                        space for students to enjoy their snacks during breaks.
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <a href="{{ route('about') }}">Learn more in <b>About Us</b></a>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container my-4 ">
            <div class="row">
                <h1><span>READY TO JOIN OUR BIG FAMILY?</span></h1>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 flex-grow ms-md-0 px-0">
                    <img src="{{ asset('media/banner.jpg') }}" alt="banner contact information" />
                </div>
                <div class="col-md-4 rounded-3 bg-body flex-grow ms-md-4 me-md-0 my-3 my-md-0" id="icon">
                    <div class="row p-4">
                        Contact Us:
                    </div>
                    <div class="row px-4">
                        <div class="col-2"><img src="{{ asset('media/Whatsapp.png') }}" alt="Whatsapp" /></div>
                        <div class="col-10">+6012-2751398 (Novy)</div>
                    </div>
                    <div class="row p-4">
                        <div class="col-2"><img src="{{ asset('media/FaceBook.png') }}" alt="FaceBook" /></div>
                        <div class="col-10"><a href="https://www.facebook.com/p/%E5%B0%8F%E8%81%AA%E6%98%8ELittle-Smart-Day-Care-Centre-100064129656590" target="_blank">LittleSmartDayCareFB</a></div>
                    </div>
                    <div class="row px-4">
                        <div class="col-2"><img src="{{ asset('media/E-mail.png') }}" alt="E-mail" /></div>
                        <div class="col-10"><a href= "mailto: littlesmartdaycare@gmail.com">littlesmartdaycare@gmail.com</a></div>
                    </div>
                    <div class="row p-4">
                        <div class="col-2"><img src="{{ asset('media/Address.png') }}" alt="Address" /></div>
                        <div class="col-10">
                            1-63, Jalan PUJ 3/9,<br>
                            Taman Puncak Jalil,<br>
                            43300 Seri Kembangan, Selangor.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.send_feedback')
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
