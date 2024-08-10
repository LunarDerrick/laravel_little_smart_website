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
                Little Smart Day Care Centre was founded in 2018. As the name suggests, the centre mainly takes
                care of children after school until their parents come back from work. In the following year,
                SJK(C) Bukit Serdang was fully constructed and began their academic years in the nearby
                vicinity, the day care centre received a sudden influx of children. After some consideration, the
                director decided to offer academic tuition services as well due to some requests from the parents
                and had been operating in such mode ever since.
                </div>
            </div>
            <!-- Duplicate the above block as needed -->
            <div class="row mb-4">
                <div class="col-md-5 order-md-2">
                    <img src="{{ asset('media/group_photo.jpg') }}" alt="students" class="img-fluid" />
                </div>
                <div class="col-md-7 order-md-1 about">
                As of 2024, Little Smart Day Care Centre has an average size of students every year, mainly
                taking in children of age 7 to 12. Our tuition covers all academic subjects, where each day will
                focus on 1 or 2 subjects. Our mission is to provide peace of mind to the parents, and boost
                children’s academic skills and confidence.
                </div>
            </div>
        </div>

    </section>

    @include('components.send_feedback')
    @include('components.footer')
</body>

</html>
