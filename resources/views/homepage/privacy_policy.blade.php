@extends('layouts/homepage')

@section('title', $data['page_title'])
@section('content')

  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">{{$data['page_title']}}</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">{{$data['page_title']}}</li>
            </ul><!-- Breadcrumbs -->
          </div>
        </div><!-- Page Title Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-90 pb-90">
      <div class="container">
        <div class="content-wrap w-100">
        {!! $data['content'] !!}
        <!-- <h5>Information collection and use</h5>
				<p>We take our responsibilities regarding the protection of personal information very seriously. This policy explains how we use personal information that we may obtain from you. By using our website  www.tripser.ae (henceforth referred to as tripser) which also comprises of the mobile site, smartphone app platforms such as iOS, Android, Windows (all together referred to as “site”), you consent to this use. This privacy policy does not apply to the websites of our business partners, corporate affiliates or to any other third parties, even if their websites are linked to the site. We recommend you review the respective privacy statements of the other parties with whom you interact. </p>
				<p> When you use services provided on this website and/or mobile application, you will be asked to provide certain information such as your name, contact details, and/or your debit/credit card details. We will store this information and hold it on computers or otherwise. </p>
				<h5>What information will we collect?</h5>
				<div>Personal information</div>
				<div>Transactional information</div>
				<div>Booking information</div>
				<div>Other information</div>

				<h5>We will use this information in the following ways</h5>
				<div>To fulfill our agreement with you, including processing your flight, reservation and any other booking, sending you your itinerary, or contacting you if there is a problem with your reservation.</div>
				<div>To register you with our website/mobile application and administer our website services where you have registered to receive these. You can unsubscribe from these services by contacting us.</div>
				<div>To answer any queries which you may send to us by e-mail.</div>
				<div>For direct marketing purposes, as set out in detail below.</div>
				<div> We need to know the names of all passengers travelling or the names related to the reservation concerned. If you are booking a flight or reservation on behalf of someone else, you must obtain their consent to use their personal information. We proceed on the basis that you have obtained the aforementioned consent. </div>

				<h5> What will this information be used for? </h5>
				<div>To conduct bookings, ticketing and payment transactions for the services available on the site.
					To personalize your experience and give you better service: (your information helps us to better respond to your individual needs)
					To improve the user friendliness of the site; (we continually strive to improve the site offerings based on the information we receive from you)
					To improve customer service (your information helps us to more effectively respond to your customer service requests and support needs) website traffic analysis</div>
				<div>To administer a contest, promotion, survey or other site features</div>
				<div>To send emails, SMS and other communications for providing services, responding to inquiries, and/or other requests or questions.</div>
				<div>To respond to queries of the authorities regarding your accessing of the site and services availed by you. </div>
				<div>Automatic Logging of Session Data</div>
				<div> Of course, you are solely responsible for maintaining the secrecy of your passwords, and your site membership account information. Please be very careful, responsible, and alert with this information, especially whenever you’re online. </div>

				<h5>How do we use your personal information?</h5>
				<div>Information you provide or that is obtained by us will be used by us to enable us to review, develop and improve the services which we offer and provide you and other customers (via mail, email, telephone or otherwise) with information about new products and services and special offers we think you will find valuable. We may also inform you about new products and services and special offers of selected third parties, if, at the time of registration, you have opted for receiving the www.tripser.ae newsletter or updates.</div>

				<h5>Who do we share your information with?</h5>
				<div>To our customer support offices in the network.</div>
				<div>To trustworthy third parties that we use for the provision of certain services, such as enabling our customers to book flights, onward flights, hire cars, hotel reservation or other services quickly and easily.</div>
				<div>To customs and/or immigration departments or other regulatory authorities in your country of departure and/or destination in order to comply with the law in those countries.</div>
				<div>To the third party organizations involved in credit card authorization.</div>
				<div>If we have a duty to do so or if the law allows us to do so.</div>
				<div>To our employees and agents to do any of the above on our behalf, now or in the future.</div>
				<div>To the companies within our corporate family and with our parent company and corporate affiliates. This sharing enables us to provide you with information about products and services, both travel-related and other, which might interest you. To the extent that our parent company and corporate affiliates have access to your information, they will follow practices that are at least as restrictive as the practices described in this privacy policy. They also will comply with applicable laws governing the transmission of promotional communications and, at a minimum, give you an opportunity in any commercial email they send to choose not to receive such email messages in the future.</div>
				<div>If you choose not to provide certain personal information we request, you will still be able to visit our site, but you may be unable to access certain options or services.</div>

				<h5>Transfer of your personal information </h5>
				<p> In the course of undertaking the activities specified in this privacy policy, we may transfer personal information to countries which do not have data protection laws or to countries where your privacy and other fundamental rights will not be protected as extensively. We will transfer information only for the purpose of fulfilling/providing the services you have requested from us, in order to fulfil a contract with a third party for your benefit, or to disclose information which we are required to do by law or requested from us by a regulator. </p>

				<h5>Cookies Policy</h5>
				<p> There is a technology called "cookies" which may be used by us to provide you with customized information from TRIPSER websites or mobile application. A cookie is an element of data that a website or mobile application can send to your browser, which may then store it on your system. Cookies allow us to understand who has seen which pages and advertisements, to determine how frequently particular pages are visited and to determine the most popular areas of our website. Cookies also allow us to make TRIPSER websites or mobile application more user-friendly by, for example, allowing us to take you to the language site of last use, so that we can give you a better experience when you return to our website. Most web browsers automatically accept cookies. You do not have to accept cookies, and you should read the information that came with your browser software to see how you can set it up to notify you when you receive a cookie, so you can decide whether to accept it. </p> -->
        </div>
      </div>
    </div>
  </section>

@endsection
