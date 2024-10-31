<!DOCTYPE html>
<html lang="en">

<head>
    <title>Access Denied - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <h1><span>Access Denied</span></h1>
        <br>

        You do not have the required permission to this page.

    </section>

    @include('components.send_feedback')
    @include('components.footer')
    @include('components.font-check')
</body>

</html>
