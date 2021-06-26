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
        <!-- <p>By accessing and using the website, you agree to accept, without modification, limitation or qualification, the terms and conditions contained herein (the "Agreement"). You represent and warrant that you possess the legal right and ability to enter into this Agreement and to use the website in accordance with all terms and conditions herein. </p>
				<p><strong>ON TRACK TRAVEL MANAGEMENT LLC</strong> tries to ensure that the information contained on the website is as accurate as possible. However, inaccuracies may arise from time to time. The website and/or any of its sister companies accept no responsibility for any errors in the information contained on <strong>TRIPSER</strong> website. </p>
				<p>
					The website contains information about the products and services <strong>TRIPSER</strong> and/or any third party is offering. This information and all other material on the website are provided in good faith. By using the website, you agree and acknowledge that the website may update, change or amend the Terms and Conditions and Customer Care Policy and/or other information provided on the website at any time without advance notice. Changed terms and conditions will become effective once posted on the website and will not have any retrospective effect on existing contractual arrangements made through the website. You should read these terms and conditions every time you visit the website to ensure that you are aware of all the relevant terms and conditions. Accordingly, your continued access and use of the website after any change is deemed to be your acceptance of the modified terms and conditions.
				</p>
				<p> While the website uses all reasonable endeavors to make the website and associated services available, the website cannot guarantee that they will operate continuously or without interruption. </p>
				<p> The website makes no representations or warranties, either expressed or implied, with respect to the website or the contents and, to the fullest extent permissible under the law, disclaims all such representations and warranties. </p>
				<p> Your access to and use of software and other materials on, or through the website is solely at your own risk. The website makes no warranty whatsoever about the reliability, stability or virus-free nature of such software. </p>
				<p> Subject to applicable law, under no circumstance is <strong>TRIPSER</strong> and/or its Licensors and/or Suppliers and/or its Service Providers responsible for any direct or indirect, incidental, special, punitive, exemplary or consequential damages of any kind (including but not limited to lost profits, lost savings or revenue, or loss or corruption of data or information) which arises out of or is in any way connected with your use of or inability to use the website whether based on breach of contract, tort, negligence, product liability or otherwise, even if advised of the possibility of such damages. This includes any information, products or services obtained through or any contract entered via the website but excludes carriage by air performed by airlines in respect of any ticket obtained using the booking engine provided on the website, which is subject to the conditions of carriage and applicable international conventions. </p>
				<h5>When using the website, you declare and agree:</h5>
				<p>To use them solely to determine the availability of products and services offered on the website and to assist you to make legitimate reservations or transact business with us. You agree to use the website only for personal, non-commercial use. </p>
				<h5>If the website considers that you have breached any of these terms and conditions or have otherwise demonstrated inappropriate conduct when using the website, TRIPSER reserves the right to:</h5>
				<p>Warn you that you have breached these terms and conditions, and ask you to stop such conduct;</p>
				<div>All content of the TRIPSER website is subject to copyright.</div>
				<div>The website is for your personal and non-commercial use. You may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, software, products or services obtained from the website.</div>
				<div>The website, sister companies’ names, and any other product or trade names of TRIPSER referenced to the website are our trademarks and/or registered trademarks. Other product and company names mentioned herein may be the trademarks of their respective owners.</div>
				<div> We accept all major credit cards and debit cards. You can make bookings on the website for passengers other than yourself. We will make every effort to maintain confidentiality when securing an online payment. This covers the security of your credit card details and other personal information. All your personal information is encrypted as it travels over the Internet. </div>
				<p> If your booking or account shows signs of fraud, abuse, or suspicious activity, the website may cancel any travel or service reservations associated with your name, email address, or account, and close any associated TRIPSER accounts. In addition, the website may verify (i.e. preauthorize) your credit card. If you have conducted any fraudulent activity, the website reserves the right to take any necessary Criminal and/or Civil legal action and you may be liable for monetary losses to the website, including litigation costs and damages. To contest the cancellation of a booking or freezing or closure of an account, please contact TRIPAER Customer Care. </p>
				<p> The website reserves the right to undertake all necessary steps to ensure that the security, safety and integrity of TRIPSER systems as well as its client’s interests are and remain, well-protected. Towards this end, TRIPSER may take various steps to verify and confirm the authenticity, enforceability and validity of orders placed by you. </p>
				<p> If <strong>TRIPSER</strong>, in its sole and exclusive discretion, concludes that the said transactions are not or do not reasonably appear to be authentic, enforceable or valid, then TRIPSER may cancel the said orders at any time up before the scheduled time of departure of the relevant flight or before the expected date of visit to any property booked through TRIPSER. </p>
				<p> As a condition of use of the <strong>TRIPSER</strong> website, you agree to indemnify us from and against all liabilities, expenses (including attorney's fees) and damages arising out of claims resulting from your use of the website, including without limitation any claims alleging facts that, if true, would constitute a breach by you of these terms and conditions. </p>
				<p> In no event will the website be liable to you for any special, indirect, incidental, consequential, punitive, reliance, or exemplary damages (including without limitation lost business opportunities, lost revenues, or loss of anticipated profits or any other pecuniary or non-pecuniary loss or damage of any nature whatsoever) arising out of or relating to (i) this agreement, (ii) the services, the site or any reference site, or (iii) your use or inability to use the services, the site (including any and all materials) or any reference sites. In no event will the website or any of its contractors, directors, employees, agents, third party partners, licensors or suppliers’ total liability to you for all damages, liabilities, losses, and causes of action arising out of or relating to (i) this Agreement, (ii) the Services, (iii) your use or inability to use the Services or the site (including any and all materials) or any reference sites, or (iv) any other interactions with the website, however caused and whether arising in contract, tort including negligence, warranty or otherwise, exceed the amount paid by you, if any, for using the portion of the Services or the Site giving rise to the cause of action or Two hundred Durham (AED 200), whichever is less. </p>
				<p> The failure of the website to exercise or enforce any right or provision of this Agreement will not constitute a waiver of such right or provision. Any waiver of any provision of this Agreement will be effective only if in writing and signed by TRIPSER. </p>
				<p> our use of the website and the terms and conditions is subject to the laws of the United Arab Emirates and you agree to submit to the exclusive jurisdiction of the courts of Dubai, United Arab Emirates. Nevertheless, the website reserves the right to bring proceedings to the courts of the country of your location. </p>
				<p> If you are dissatisfied with any aspect of the website or if you have any grievances about any of the services provided by the website please contact us. </p>
				<div class="divider3 w-100"></div>
				<h5>How to reach TRIPSER:</h5>
				<div>Email directly to support@tripser.ae</div>
				<div>TRIPSER may provide you with notices and communications by email, regular mail or postings on the site or by any other reasonable means. Except as otherwise set forth herein, notice to the website must be sent by courier or registered address: </div>
				<div class="mt-2">ON TRACK TOURISM LLC </div>
				<div>OPEL TOWER OFFICE 301 BUSINESS BAY </div>
				<div>DUBAI UAE.</div> -->
        </div>
      </div>
    </div>
  </section>


@endsection
