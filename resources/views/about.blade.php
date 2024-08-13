<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <h1>About Us</h1>
        <br>

        <div class="container">
            <!-- Row for each block -->
            <div class="row mb-4">
                <div class="col-md-5 order-md-2">
                    <img src="{{ asset('media/building.png') }}" alt="day care centre building" class="img-fluid" />
                </div>
                <div class="col-md-7 order-md-1 about">
                Established in 2018, Little Smart Day Care Centre provides after-school care for children until their parents return from work.
                With the opening of SJK(C) Bukit Serdang nearby the following year, the centre experienced a surge in enrolments.
                To meet parents’ requests, we expanded our services to include academic tuition, which has been a core part of our offerings ever since.
                </div>
            </div>
            <!-- Duplicate the above block as needed -->
            <div class="row mb-4">
                <div class="col-md-5 order-md-2">
                    <img src="{{ asset('media/group_photo.jpg') }}" alt="group of students" class="img-fluid" />
                </div>
                <div class="col-md-7 order-md-1 about">
                As of 2024, Little Smart Day Care Centre caters to children aged 7 to 12, maintaining a consistent number of students each year.
                Our tuition program covers all academic subjects, with each day dedicated to focusing on one or two subjects.
                We aim to provide a supportive environment that enhances both the academic skills and confidence of our students.
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-5 order-md-2">
                    <img src="{{ asset('media/achievement.jpg') }}" alt="students holding certificate" class="img-fluid" />
                </div>
                <div class="col-md-7 order-md-1 about">
                Our centre is equipped with three well-furnished classrooms, creating a comfortable and conducive learning environment.
                Additionally, the spacious lobby provides a great space for students to relax and socialize with their peers during breaks.
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-5 order-md-2">
                    <img src="{{ asset('media/score.jpg') }}" alt="full score math paper" class="img-fluid" />
                </div>
                <div class="col-md-7 order-md-1 about">
                Over the years, our students have consistently excelled in their studies, receiving positive feedback from their parents.
                Their achievements reflect the dedication and quality of the education we provide.
                <br><br>
                For any enquiries, you may reach out to:<br>
                <i>
                Novy (Whatsapp):&nbsp; 012-2751398<br>
                1-63, Jalan PUJ 3/9,<br>
                Taman Puncak Jalil,<br>
                43300 Seri Kembangan, Selangor.<br>
                </i>
                </div>
            </div>
        </div>

    </section>

    @include('components.send_feedback')
    @include('components.footer')
</body>

</html>
