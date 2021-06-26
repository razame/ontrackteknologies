@extends('layouts/homepage')

@section('title', 'Reservation')
@section('content')

  <section>
    <div class="w-100">
      <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="notgeneric125"
           data-source="gallery" style="background-color:transparent;padding:0px;">
        <div id="rev_slider_4_1" class="rev_slider fullscreenbanner"
             style="display:none;background-image: url(/homepage/images/bg_new.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;"
             data-version="5.4.1">
          <ul>
            <li data-index="rs-1" data-transition="random" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-title="Slide Title" data-easein="Power4.easeInOut"
                data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="random"
                data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-param1="" data-param2=""
                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                data-param10="" data-description="">

              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-resizeme"
                   id="slide1-layer-1"
                   data-x="['right','right','right','right']" data-hoffset="['-110','-110','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['80','80','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:0;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide1-mckp1.png" alt="Slide 1 Mockup 1">
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                   id="slide1-layer-2"
                   data-x="['right','right','right','right']" data-hoffset="['375','375','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-235','-235','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:top;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2600,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide1-mckp2.png" alt="Slide 1 Mockup 2">
              </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                   id="slide1-layer-3"
                   data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-300','-300','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:top;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide1-mckp3.png" alt="Slide 1 Mockup 3">
              </div>

              <!-- LAYER NR. 4 -->
              <div class="tp-caption tp-resizeme"
                   id="slide1-layer-4"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-70,'-50']"
                   data-fontsize="['80','70','50','40']"
                   data-lineheight="['85','75','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="image"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="letter-spacing: 0;font-weight:800;font-family: Nunito;color:#fff;">the best of <br> both world
              </div>

              <!-- LAYER NR. 5 -->
              <div class="tp-caption"
                   id="slide1-layer-5"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['40','40','40','30']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="line-height: 26px;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 400;color: #fff;">
                Because of our local presence, our customers get the best of both worlds
              </div>

              <!-- LAYER NR. 6 -->
              <div class="tp-caption rev-btn theme-btn fill-btn2"
                   id="slide1-layer-6"
                   data-x="['left','center','center','center']" data-hoffset="['0','-100','-100','-100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/about"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Read More
              </div>

              <!-- LAYER NR. 7 -->
              <div class="tp-caption rev-btn theme-btn bordered-btn2"
                   id="slide1-layer-7"
                   data-x="['left','center','center','center']" data-hoffset="['210','100','100','100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/contacts"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Contact Us
              </div>
            </li>
            <li data-index="rs-2" data-transition="random" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-title="Slide Title" data-easein="Power4.easeInOut"
                data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="random"
                data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-param1="" data-param2=""
                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                data-param10="" data-description="">

              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-resizeme"
                   id="slide2-layer-1"
                   data-x="['right','right','right','right']" data-hoffset="['150','150','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:0;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide2-mckp1.png" alt="Slide 2 Mockup 1">
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                   id="slide2-layer-2"
                   data-x="['right','right','right','right']" data-hoffset="['330','330','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['50','50','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:bottom;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2600,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide2-mckp2.png" alt="Slide 2 Mockup 2">
              </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                   id="slide2-layer-3"
                   data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:top;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide2-mckp3.png" alt="Slide 2 Mockup 3">
              </div>

              <!-- LAYER NR. 4 -->
              <div class="tp-caption tp-resizeme"
                   id="slide2-layer-4"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-70','-60']"
                   data-fontsize="['80','70','50','40']"
                   data-lineheight="['85','75','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="image"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="letter-spacing: 0;font-weight:800;font-family: Nunito;color:#fff;">Compare Us
              </div>

              <!-- LAYER NR. 5 -->
              <div class="tp-caption"
                   id="slide2-layer-5"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['40','40','40','30']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="line-height: 26px;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 400;color: #fff;">
                the lowest prices available for Flight, hotels, cars with the highest levels of quality. <br>Just
                compare us with our competition for any of our travel products.
              </div>

              <!-- LAYER NR. 6 -->
              <div class="tp-caption rev-btn theme-btn fill-btn2"
                   id="slide2-layer-6"
                   data-x="['left','center','center','center']" data-hoffset="['0','-100','-100','-100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/about"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Read More
              </div>

              <!-- LAYER NR. 7 -->
              <div class="tp-caption rev-btn theme-btn bordered-btn2"
                   id="slide2-layer-7"
                   data-x="['left','center','center','center']" data-hoffset="['210','100','100','100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/contacts"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Contact Us
              </div>
            </li>
            <li data-index="rs-3" data-transition="random" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-title="Slide Title" data-easein="Power4.easeInOut"
                data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="random"
                data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-param1="" data-param2=""
                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                data-param10="" data-description="">

              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-resizeme"
                   id="slide3-layer-1"
                   data-x="['right','right','right','right']" data-hoffset="['160','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-40','0','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:0;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide3-mckp1.png" alt="Slide 3 Mockup 1">
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                   id="slide3-layer-2"
                   data-x="['right','right','right','right']" data-hoffset="['80','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['103','0','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:top;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2600,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide3-mckp2.png" alt="Slide 3 Mockup 2">
              </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                   id="slide3-layer-3"
                   data-x="['right','right','right','right']" data-hoffset="['-40','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['200','0','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:top;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide3-mckp3.png" alt="Slide 3 Mockup 3">
              </div>

              <!-- LAYER NR. 4 -->
              <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                   id="slide3-layer-4"
                   data-x="['right','right','right','right']" data-hoffset="['150','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['90','0','0','0']"
                   data-fontsize="['60','60','50','40']"
                   data-lineheight="['70','70','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:bottom;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
              ><img src="/homepage/images/resources/slide3-mckp4.png" alt="Slide 3 Mockup 4">
              </div>

              <!-- LAYER NR. 5 -->
              <div class="tp-caption tp-resizeme"
                   id="slide3-layer-5"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-70','-60']"
                   data-fontsize="['80','70','50','40']"
                   data-lineheight="['85','75','60','50']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="image"
                   data-responsive_offset="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="letter-spacing: 0;font-weight:800;font-family: Nunito;color:#fff;">client needs
              </div>

              <!-- LAYER NR. 6 -->
              <div class="tp-caption"
                   id="slide3-layer-6"
                   data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['40','40','40','30']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="text"
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['left','center','center','center']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="line-height: 26px;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 400;color: #fff;">
                Understanding the client needs and ensuring wholesome satisfaction of the customer
              </div>

              <!-- LAYER NR. 7 -->
              <div class="tp-caption rev-btn theme-btn fill-btn2"
                   id="slide3-layer-7"
                   data-x="['left','center','center','center']" data-hoffset="['0','-100','-100','-100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/about"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Read More
              </div>

              <!-- LAYER NR. 8 -->
              <div class="tp-caption rev-btn theme-btn bordered-btn2"
                   id="slide3-layer-8"
                   data-x="['left','center','center','center']" data-hoffset="['210','100','100','100']"
                   data-y="['middle','middle','middle','middle']" data-voffset="['167','150','120','120']"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap"
                   data-type="button"
                   data-actions='[{"event":"click","action":"simplelink","slide":"next","delay":"","target": "_self", "url": "/contacts"}]'
                   data-responsive_offset="on"
                   data-responsive="on"
                   data-frames='[{"from":"y:-[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                   data-textAlign="['center','center','center','center']"
                   data-paddingtop="[21,17,14,12]"
                   data-paddingright="[44,40,35,30]"
                   data-paddingbottom="[21,17,14,12]"
                   data-paddingleft="[44,40,35,30]"
                   style="cursor:pointer;line-height: 14px;display: inline-block;font-family: Rubik;font-size: 1rem;letter-spacing: 0;font-weight: 600;">
                Contact Us
              </div>
            </li>
          </ul>
        </div>
      </div><!-- END REVOLUTION SLIDER -->
    </div>
  </section>
  <section>
    <div class="w-100 bg-color5 position-relative service-wrap">
      <div class="bg-waves">
        <div class="wave wave-bottom-left">
          <img class="layer" src="/homepage/images/bottom-left2.png" alt="bottom-left2">
          <img class="layer" src="/homepage/images/bottom-left1.png" alt="bottom-left1">
        </div>
        <div class="wave wave-bottom-right">
          <img class="layer" src="/homepage/images/bottom-right2.png" alt="bottom-right2">
          <img class="layer" src="/homepage/images/bottom-right1.png" alt="bottom-right1">
        </div>
      </div>
      <div class="container">
        <div class="service-caro">
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-mtasvg-init="" class="085-presentation-2.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                  xml:space="preserve">
							<path class="cwssvgi_0" style="fill:#35495C;"
                    d="M348.942,418.909H162.76c-6.982,0-11.636-4.655-11.636-11.636s4.655-11.636,11.636-11.636h186.182 c6.982,0,11.636,4.655,11.636,11.636S355.924,418.909,348.942,418.909z"></path>
							<path class="cwssvgi_1" style="fill:#123247;"
                    d="M187.196,400.291l1.164-4.655h-24.436l-4.655,11.636h-8.145c0,4.655,3.491,9.309,8.145,10.473 c1.164,0,2.327,1.164,3.491,1.164h18.618h167.564c6.982,0,11.636-4.655,11.636-11.636H193.015 C189.524,407.273,186.033,403.782,187.196,400.291z"></path>
							<path class="cwssvgi_2" style="fill:#576D7E;"
                    d="M407.124,488.727h-15.127L341.96,349.091h-24.436l55.855,154.764 c1.164,4.655,5.818,8.145,10.473,8.145h23.273c6.982,0,11.636-4.655,11.636-11.636S414.106,488.727,407.124,488.727z"></path>
							<path class="cwssvgi_3" style="fill:#576D7E;"
                    d="M169.742,349.091l-50.036,139.636h-15.127c-6.982,0-11.636,4.655-11.636,11.636 S97.596,512,104.578,512h23.273c4.655,0,9.309-3.491,10.473-8.145l55.855-154.764H169.742z"></path>
							<path class="cwssvgi_4" style="fill:#35495C;"
                    d="M407.124,488.727h-11.636c6.982,0,11.636,4.655,11.636,11.636S402.469,512,395.487,512h11.636 c6.982,0,11.636-4.655,11.636-11.636S414.106,488.727,407.124,488.727z"></path>
							<path class="cwssvgi_5" style="fill:#B0C4D8;"
                    d="M453.669,349.091H58.033c-19.782,0-34.909-15.127-34.909-34.909V46.545h465.455v267.636 C488.578,333.964,473.451,349.091,453.669,349.091z"></path>
							<path class="cwssvgi_6" style="fill:#35495C;"
                    d="M341.96,349.091L341.96,349.091h-11.636l0,0h-12.8l8.145,23.273c8.145,0,15.127,4.655,17.455,12.8 l33.745,93.091c2.327,6.982,8.145,10.473,15.127,10.473l-48.873-136.145L341.96,349.091z"></path>
							<path class="cwssvgi_7" style="fill:#35495C;"
                    d="M182.542,349.091L182.542,349.091h-12.8l-8.145,23.273h2.327c4.655,0,8.145,4.655,6.982,9.309 l-43.055,122.182c-2.327,4.655-6.982,8.145-11.636,8.145h11.636c4.655,0,9.309-3.491,10.473-8.145l55.855-154.764H182.542z"></path>
							<path class="cwssvgi_8" style="fill:#99B4CD;"
                    d="M465.306,58.182v34.909l0,0v221.091H46.396c0,12.8,10.473,23.273,23.273,23.273h384 c12.8,0,23.273-10.473,23.273-23.273V104.727c0-6.982,4.655-11.636,11.636-11.636V58.182H465.306z"></path>
							<path class="cwssvgi_9" style="fill:#ECEFF9;"
                    d="M453.669,325.818H58.033c-6.982,0-11.636-4.655-11.636-11.636V69.818h418.909v244.364 C465.306,321.164,460.651,325.818,453.669,325.818z"></path>
							<path class="cwssvgi_10" style="fill:#B0C4D8;"
                    d="M197.669,290.909c-2.327,0-4.655-1.164-6.982-2.327c-4.655-3.491-6.982-10.473-2.327-16.291 l58.182-81.455c3.491-5.818,10.473-6.982,16.291-2.327c4.655,3.491,6.982,10.473,2.327,16.291l-58.182,81.455 C204.651,289.745,201.16,290.909,197.669,290.909z"></path>
							<path class="cwssvgi_11" style="fill:#B0C4D8;"
                    d="M337.306,244.364c-1.164,0-3.491,0-4.655-1.164l-81.455-34.909 c-5.818-2.327-8.145-9.309-5.818-15.127c2.327-5.818,9.309-8.145,15.127-5.818l81.455,34.909c5.818,2.327,8.145,9.309,5.818,15.127 C346.615,242.036,341.96,244.364,337.306,244.364z"></path>
							<path class="cwssvgi_12" style="fill:#99B4CD;"
                    d="M337.306,232.727c-1.164,0-3.491,0-4.655-1.164l-81.455-34.909c-2.327-1.164-3.491-2.327-5.818-4.655 l-1.164,1.164c-2.327,5.818,0,12.8,5.818,15.127l81.455,34.909c2.327,1.164,4.655,1.164,5.818,1.164 c4.655,0,9.309-2.327,10.473-6.982c1.164-3.491,1.164-6.982-1.164-10.473C345.451,230.4,340.796,232.727,337.306,232.727z"></path>
							<path class="cwssvgi_13" style="fill:#B0C4D8;"
                    d="M337.306,244.364c-2.327,0-4.655,0-5.818-2.327c-5.818-3.491-6.982-10.473-3.491-16.291 l58.182-93.091c3.491-5.818,10.473-6.982,16.291-3.491c5.818,3.491,6.982,10.473,3.491,16.291l-58.182,93.091 C345.451,242.036,340.796,244.364,337.306,244.364z"></path>
							<path class="cwssvgi_14" style="fill:#B0C4D8;"
                    d="M197.669,290.909c-1.164,0-3.491,0-4.655-1.164l-81.455-34.909 c-5.818-2.327-8.145-9.309-5.818-15.127c2.327-5.818,9.309-8.145,15.127-5.818l81.455,34.909c5.818,2.327,8.145,9.309,5.818,15.127 C206.978,288.582,202.324,290.909,197.669,290.909z"></path>
							<path class="cwssvgi_15" style="fill:#99B4CD;"
                    d="M206.978,273.455c-1.164,3.491-5.818,5.818-9.309,5.818c-1.164,0-3.491,0-4.655-1.164L111.56,243.2 c-2.327-1.164-3.491-2.327-5.818-4.655l-1.164,1.164c-2.327,5.818,0,12.8,5.818,15.127l81.455,34.909 c2.327,1.164,4.655,1.164,5.818,1.164c4.655,0,9.309-2.327,10.473-6.982C209.306,280.436,209.306,276.945,206.978,273.455z"></path>
							<circle class="cwssvgi_16" style="fill:#EE2C39;" cx="197.669" cy="279.273" r="23.273"></circle>
							<circle class="cwssvgi_17" style="fill:#3BB54A;" cx="116.215" cy="244.364" r="23.273"></circle>
							<circle class="cwssvgi_18" style="fill:#3BB54A;" cx="255.851" cy="197.818" r="23.273"></circle>
							<circle class="cwssvgi_19" style="fill:#EE2C39;" cx="337.306" cy="232.727" r="23.273"></circle>
							<circle class="cwssvgi_20" style="fill:#3BB54A;" cx="395.487" cy="139.636" r="23.273"></circle>
							<path class="cwssvgi_21" style="fill:#99B4CD;"
                    d="M374.542,150.109l-2.327,4.655c0,2.327,1.164,5.818,2.327,6.982c2.327,4.655,2.327,9.309,0,13.964 l-24.436,38.4c2.327,2.327,4.655,4.655,6.982,8.145l30.255-48.873l6.982-10.473C386.178,162.909,379.196,157.091,374.542,150.109z"></path>
							<path class="cwssvgi_22" style="fill:#99B4CD;"
                    d="M234.906,207.127l-2.327,3.491c0,3.491,1.164,5.818,2.327,8.145 c2.327,4.655,1.164,10.473-1.164,13.964l-20.945,29.091c2.327,2.327,4.655,4.655,5.818,8.145l27.927-38.4l6.982-10.473 C245.378,219.927,238.396,215.273,234.906,207.127z"></path>
							<path class="cwssvgi_23" style="fill:#CC202C;"
                    d="M353.596,249.018c6.982-6.982,8.145-18.618,4.655-26.764c-1.164-3.491-6.982-3.491-9.309-1.164 l-23.273,23.273c-2.327,2.327-2.327,6.982,1.164,9.309C336.142,258.327,346.615,256,353.596,249.018z"></path>
							<path class="cwssvgi_24" style="fill:#CC202C;"
                    d="M213.96,295.564c6.982-6.982,8.145-18.618,4.655-26.764c-1.164-3.491-6.982-3.491-9.309-1.164 l-23.273,23.273c-2.327,2.327-2.327,6.982,1.164,9.309C196.506,304.873,206.978,302.545,213.96,295.564z"></path>
							<path class="cwssvgi_25" style="fill:#0E9347;"
                    d="M411.778,155.927c6.982-6.982,8.145-18.618,4.655-26.764c-1.164-3.491-6.982-3.491-9.309-1.164 l-23.273,23.273c-2.327,2.327-2.327,6.982,1.164,9.309C394.324,165.236,404.796,162.909,411.778,155.927z"></path>
							<path class="cwssvgi_26" style="fill:#0E9347;"
                    d="M272.142,214.109c6.982-6.982,8.145-18.618,4.655-26.764c-1.164-3.491-6.982-3.491-9.309-1.164 l-23.273,23.273c-2.327,2.327-2.327,6.982,1.164,9.309C254.687,223.418,265.16,221.091,272.142,214.109z"></path>
							<path class="cwssvgi_27" style="fill:#0E9347;"
                    d="M132.506,260.655c6.982-6.982,8.145-18.618,4.655-26.764c-1.164-3.491-6.982-3.491-9.309-1.164 L104.578,256c-2.327,2.327-2.327,6.982,1.164,9.309C115.051,269.964,125.524,267.636,132.506,260.655z"></path>
							<rect class="cwssvgi_28" x="46.396" y="69.818" style="fill:#C4D7E5;" width="418.909"
                    height="23.273"></rect>
							<rect class="cwssvgi_29" x="23.124" y="58.182" style="fill:#99B4CD;" width="23.273"
                    height="34.909"></rect>
							<path class="cwssvgi_30" style="fill:#4C9CD6;"
                    d="M476.942,69.818H34.76c-12.8,0-23.273-10.473-23.273-23.273l0,0c0-12.8,10.473-23.273,23.273-23.273 h442.182c12.8,0,23.273,10.473,23.273,23.273l0,0C500.215,59.345,489.742,69.818,476.942,69.818z"></path>
							<path class="cwssvgi_31" style="fill:#70B7E5;"
                    d="M52.215,23.273h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H52.215 c-3.491,0-5.818-2.327-5.818-5.818l0,0C46.396,25.6,48.724,23.273,52.215,23.273z"></path>
							<path class="cwssvgi_32" style="fill:#99B4CD;"
                    d="M98.76,116.364h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H98.76 c-3.491,0-5.818-2.327-5.818-5.818l0,0C92.942,118.691,95.269,116.364,98.76,116.364z"></path>
							<path class="cwssvgi_33" style="fill:#99B4CD;"
                    d="M98.76,139.636h58.182c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H98.76 c-3.491,0-5.818-2.327-5.818-5.818l0,0C92.942,141.964,95.269,139.636,98.76,139.636z"></path>
							<path class="cwssvgi_34" style="fill:#70B7E5;"
                    d="M145.306,34.909L145.306,34.909c-3.491,0-5.818-2.327-5.818-5.818l0,0 c0-3.491,2.327-5.818,5.818-5.818l0,0c3.491,0,5.818,2.327,5.818,5.818l0,0C151.124,32.582,148.796,34.909,145.306,34.909z"></path>
							<path class="cwssvgi_35" style="fill:#576D7E;"
                    d="M267.487,23.273h-23.273V11.636C244.215,4.655,248.869,0,255.851,0l0,0 c6.982,0,11.636,4.655,11.636,11.636V23.273z"></path>
							<path class="cwssvgi_36" style="fill:#35495C;"
                    d="M267.487,23.273v-5.818c0-3.491-2.327-5.818-5.818-5.818c-3.491,0-5.818,2.327-5.818,5.818v5.818 H267.487z"></path>
							<path class="cwssvgi_37" style="fill:#EE2C39;"
                    d="M75.487,116.364c-3.491,0-5.818,2.327-5.818,5.818l0,0c0,3.491,2.327,5.818,5.818,5.818 c3.491,0,5.818-2.327,5.818-5.818l0,0C81.306,118.691,78.978,116.364,75.487,116.364z M75.487,119.855 C75.487,119.855,75.487,118.691,75.487,119.855L75.487,119.855C75.487,118.691,75.487,119.855,75.487,119.855z"></path>
							<path class="cwssvgi_38" style="fill:#3BB54A;"
                    d="M75.487,139.636c-3.491,0-5.818,2.327-5.818,5.818l0,0c0,3.491,2.327,5.818,5.818,5.818 c3.491,0,5.818-2.327,5.818-5.818l0,0C81.306,141.964,78.978,139.636,75.487,139.636z M75.487,143.127L75.487,143.127 L75.487,143.127L75.487,143.127z"></path>
							<path class="cwssvgi_39" style="fill:#3689C9;"
                    d="M476.942,23.273L476.942,23.273c0,12.8-10.473,23.273-23.273,23.273H11.487 c0,12.8,10.473,23.273,23.273,23.273h441.018c11.636,0,22.109-8.145,24.436-19.782C502.542,36.073,490.906,23.273,476.942,23.273z"></path>
							<path class="cwssvgi_40" style="fill:#1470B8;"
                    d="M389.669,58.182h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 h-69.818c-3.491,0-5.818-2.327-5.818-5.818l0,0C383.851,60.509,386.178,58.182,389.669,58.182z"></path>
							<path class="cwssvgi_41" style="fill:#1470B8;"
                    d="M331.487,58.182h34.909c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 h-34.909c-3.491,0-5.818-2.327-5.818-5.818l0,0C325.669,60.509,327.996,58.182,331.487,58.182z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">01</i>
                <h3 class="mb-0">Hotel Booking</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-mtasvg-init="" class="091-chat.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 488.727 488.727"
                                  style="enable-background:new 0 0 488.727 488.727;" xml:space="preserve">
							<path class="cwssvgi_0" style="fill:#3689C9;"
                    d="M139.636,151.273c-12.8,0-23.273,10.473-23.273,23.273v232.727v52.364 c0,9.309,8.145,17.455,17.455,17.455l0,0c3.491,0,6.982-1.164,10.473-3.491l75.636-57.018c8.145-5.818,17.455-9.309,27.927-9.309 h217.6c12.8,0,23.273-10.473,23.273-23.273V174.545c0-12.8-10.473-23.273-23.273-23.273H139.636z"></path>
							<path class="cwssvgi_1" style="fill:#1470B8;"
                    d="M465.455,151.273v221.091c0,6.982-4.655,11.636-11.636,11.636H224.582 c-10.473,0-19.782,3.491-27.927,9.309l-75.636,57.018c-1.164,1.164-3.491,2.327-4.655,2.327v6.982 c0,9.309,8.145,17.455,17.455,17.455c3.491,0,6.982-1.164,10.473-3.491l75.636-57.018c8.145-5.818,17.455-9.309,27.927-9.309h217.6 c12.8,0,23.273-10.473,23.273-23.273V174.545C488.727,161.745,478.255,151.273,465.455,151.273z"></path>
							<circle class="cwssvgi_2" style="fill:#EAECED;" cx="302.545" cy="279.273" r="23.273"></circle>
							<circle class="cwssvgi_3" style="fill:#EAECED;" cx="384" cy="279.273" r="23.273"></circle>
							<circle class="cwssvgi_4" style="fill:#EAECED;" cx="221.091" cy="279.273" r="23.273"></circle>
							<path class="cwssvgi_5" style="fill:#C9D5E3;"
                    d="M393.309,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C407.273,269.964,401.455,261.818,393.309,258.327z"></path>
							<path class="cwssvgi_6" style="fill:#C9D5E3;"
                    d="M311.855,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C325.818,269.964,320,261.818,311.855,258.327z"></path>
							<path class="cwssvgi_7" style="fill:#C9D5E3;"
                    d="M230.4,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C244.364,269.964,238.545,261.818,230.4,258.327z"></path>
							<path class="cwssvgi_8" style="fill:#0261A5;"
                    d="M232.727,221.091h-17.455l5.818-69.818h23.273v58.182 C244.364,216.436,239.709,221.091,232.727,221.091z"></path>
							<path class="cwssvgi_9" style="fill:#90C962;"
                    d="M0,34.909v116.364c0,12.8,10.473,23.273,23.273,23.273h102.4c9.309,0,18.618,2.327,25.6,8.145 l53.527,36.073c3.491,2.327,5.818,3.491,10.473,3.491l0,0c9.309,0,17.455-8.145,17.455-17.455v-30.255V34.909 c0-12.8-10.473-23.273-23.273-23.273H23.273C10.473,11.636,0,22.109,0,34.909z"></path>
							<path class="cwssvgi_10" style="fill:#71B956;"
                    d="M209.455,11.636v128v29.091c0,9.309-8.145,17.455-17.455,17.455c-3.491,0-6.982-1.164-10.473-3.491 l-32.582-24.436c-5.818-4.655-13.964-6.982-20.945-6.982H0c0,12.8,10.473,23.273,23.273,23.273h102.4 c9.309,0,18.618,2.327,25.6,8.145l53.527,36.073c3.491,2.327,5.818,3.491,10.473,3.491c9.309,0,17.455-8.145,17.455-17.455v-30.255 V34.909C232.727,22.109,222.255,11.636,209.455,11.636z"></path>
							<circle class="cwssvgi_11" style="fill:#EAECED;" cx="116.364" cy="93.091" r="11.636"></circle>
							<circle class="cwssvgi_12" style="fill:#EAECED;" cx="69.818" cy="93.091" r="11.636"></circle>
							<circle class="cwssvgi_13" style="fill:#EAECED;" cx="162.909" cy="93.091" r="11.636"></circle>
							<path class="cwssvgi_14" style="fill:#70B7E5;"
                    d="M151.273,238.545v69.818c0,3.491-2.327,5.818-5.818,5.818l0,0c-3.491,0-5.818-2.327-5.818-5.818 v-69.818c0-3.491,2.327-5.818,5.818-5.818l0,0C148.945,232.727,151.273,235.055,151.273,238.545z"></path>
							<path class="cwssvgi_15" style="fill:#B2D890;"
                    d="M23.273,52.364v34.909c0,3.491-2.327,5.818-5.818,5.818l0,0c-3.491,0-5.818-2.327-5.818-5.818V52.364 c0-3.491,2.327-5.818,5.818-5.818l0,0C20.945,46.545,23.273,48.873,23.273,52.364z"></path>
							<path class="cwssvgi_16" style="fill:#70B7E5;"
                    d="M139.636,331.636L139.636,331.636c0-3.491,2.327-5.818,5.818-5.818l0,0 c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818l0,0C141.964,337.455,139.636,335.127,139.636,331.636z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">02</i>
                <h3 class="mb-0">Flight Booking</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-mtasvg-init="" class="075-target-3.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                  xml:space="preserve">
							<path class="cwssvgi_0" style="fill:#B06328;"
                    d="M356.073,424.727c-11.636,8.145-23.273,15.127-36.073,20.945l23.273,51.2 c3.491,8.145,12.8,13.964,22.109,13.964l0,0c10.473,0,18.618-8.145,18.618-18.618c0-2.327,0-5.818-1.164-8.145L356.073,424.727z"></path>
							<path class="cwssvgi_1" style="fill:#B06328;"
                    d="M109.382,424.727l-26.764,59.345c-1.164,3.491-1.164,5.818-1.164,9.309 c0,10.473,8.145,18.618,18.618,18.618l0,0c9.309,0,18.618-5.818,22.109-13.964l23.273-51.2 C132.655,441.018,121.018,434.036,109.382,424.727z"></path>
							<path class="cwssvgi_2" style="fill:#B06328;"
                    d="M256,58.182h-46.545V34.909c0-12.8,10.473-23.273,23.273-23.273l0,0 c12.8,0,23.273,10.473,23.273,23.273V58.182z"></path>
							<path class="cwssvgi_3" style="fill:#9F5223;"
                    d="M256,58.182h-23.273V34.909c0-6.982,4.655-11.636,11.636-11.636l0,0 c6.982,0,11.636,4.655,11.636,11.636V58.182z"></path>
							<circle class="cwssvgi_4" style="fill:#F04B4D;" cx="232.727" cy="256" r="209.455"></circle>
							<path class="cwssvgi_5" style="fill:#9F5223;"
                    d="M356.073,424.727c-11.636,8.145-23.273,15.127-36.073,20.945l10.473,23.273 c5.818-2.327,11.636-5.818,16.291-8.145c5.818-3.491,13.964-1.164,16.291,5.818l8.145,17.455c1.164,2.327,1.164,4.655,1.164,8.145 c0,8.145-5.818,16.291-13.964,18.618c2.327,0,3.491,1.164,5.818,1.164l0,0c10.473,0,18.618-8.145,18.618-18.618 c0-2.327,0-5.818-1.164-8.145L356.073,424.727z"></path>
							<path class="cwssvgi_6" style="fill:#9F5223;"
                    d="M109.382,424.727l-4.655,10.473c4.655,3.491,9.309,8.145,13.964,11.636s5.818,9.309,3.491,13.964 l-11.636,25.6c-3.491,8.145-11.636,13.964-22.109,13.964l0,0c-2.327,0-4.655,0-5.818-1.164c2.327,6.982,9.309,12.8,17.455,12.8l0,0 c9.309,0,18.618-5.818,22.109-13.964l23.273-51.2C132.655,441.018,121.018,434.036,109.382,424.727z"></path>
							<path class="cwssvgi_7" style="fill:#DE333F;"
                    d="M437.527,210.618c-1.164-8.145-3.491-15.127-5.818-22.109l-202.473,55.855 c-5.818,1.164-9.309,8.145-8.145,13.964c1.164,3.491,2.327,5.818,5.818,6.982c2.327,2.327,5.818,2.327,9.309,2.327L437.527,210.618z "></path>
							<path class="cwssvgi_8" style="fill:#ECEFF9;"
                    d="M232.727,93.091c-89.6,0-162.909,73.309-162.909,162.909s73.309,162.909,162.909,162.909 S395.636,345.6,395.636,256S322.327,93.091,232.727,93.091z M232.727,372.364c-64,0-116.364-52.364-116.364-116.364 s52.364-116.364,116.364-116.364S349.091,192,349.091,256S296.727,372.364,232.727,372.364z"></path>
							<path class="cwssvgi_9" style="fill:#ECEFF9;"
                    d="M232.727,186.182c-38.4,0-69.818,31.418-69.818,69.818s31.418,69.818,69.818,69.818 S302.545,294.4,302.545,256S271.127,186.182,232.727,186.182z M232.727,290.909c-19.782,0-34.909-15.127-34.909-34.909 s15.127-34.909,34.909-34.909s34.909,15.127,34.909,34.909S252.509,290.909,232.727,290.909z"></path>
							<path class="cwssvgi_10" style="fill:#F6B545;"
                    d="M395.636,93.091l33.745,8.145c8.145,2.327,16.291,0,22.109-5.818l37.236-37.236l-46.545-11.636 L430.545,0l-37.236,37.236c-5.818,5.818-8.145,13.964-5.818,22.109L395.636,93.091z"></path>
							<polygon class="cwssvgi_11" style="fill:#F19920;"
                       points="427.055,101.236 473.6,54.691 448,47.709 401.455,94.255 "></polygon>
							<path class="cwssvgi_12" style="fill:#7F4122;"
                    d="M232.727,267.636c-3.491,0-5.818-1.164-8.145-3.491c-4.655-4.655-4.655-11.636,0-16.291 L457.309,15.127c4.655-4.655,11.636-4.655,16.291,0c4.655,4.655,4.655,11.636,0,16.291L240.873,264.145 C238.545,266.473,236.218,267.636,232.727,267.636z"></path>
							<path class="cwssvgi_13" style="fill:#C4D7E5;"
                    d="M386.327,201.309l-45.382,12.8c2.327,6.982,4.655,15.127,5.818,22.109l45.382-12.8 C390.982,216.436,388.655,208.291,386.327,201.309z"></path>
							<path class="cwssvgi_14" style="fill:#C4D7E5;"
                    d="M302.545,249.018c-1.164-8.145-3.491-15.127-5.818-22.109l-34.909,9.309 c3.491,5.818,5.818,12.8,5.818,19.782c0,1.164,0,1.164,0,2.327L302.545,249.018z"></path>
							<path class="cwssvgi_15" style="fill:#73371B;"
                    d="M232.727,267.636c3.491,0,5.818-1.164,8.145-3.491L473.6,31.418c4.655-4.655,4.655-11.636,0-16.291 L224.582,264.145C226.909,266.473,229.236,267.636,232.727,267.636z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">03</i>
                <h3 class="mb-0">Airport Transfer Booking</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-cwssvg-init="" class="079-website-1.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                  xml:space="preserve">
							<path class="mtasvgi_0" style="fill:#B0C4D8;"
                    d="M488.727,430.545H23.273C10.473,430.545,0,420.073,0,407.273v-384C0,10.473,10.473,0,23.273,0 h465.455C501.527,0,512,10.473,512,23.273v384C512,420.073,501.527,430.545,488.727,430.545z"></path>
							<path class="cwssvgi_1" style="fill:#99B4CD;"
                    d="M152.436,407.273c2.327,4.655,4.655,9.309,6.982,13.964l-17.455,9.309h124.509 c-9.309,0-41.891-9.309-57.018-23.273H152.436z"></path>
							<path class="cwssvgi_2" style="fill:#99B4CD;"
                    d="M336.291,407.273c-15.127,13.964-34.909,23.273-57.018,23.273h124.509l-5.818-9.309 c2.327-4.655,5.818-9.309,6.982-13.964H336.291z"></path>
							<rect class="cwssvgi_3" x="23.273" y="69.818" style="fill:#ECEFF9;" width="465.455"
                    height="337.455"></rect>
							<path class="cwssvgi_4" style="fill:#C4D7E5;"
                    d="M397.964,276.945l20.945-34.909l-32.582-32.582L351.418,230.4c-11.636-6.982-25.6-12.8-39.564-16.291 l0,0l-9.309-39.564H256l-9.309,39.564l0,0c-13.964,3.491-27.927,9.309-39.564,16.291l-34.909-20.945l-32.582,32.582l20.945,34.909 c-6.982,11.636-12.8,25.6-16.291,39.564l-39.564,9.309v46.545l39.564,9.309l0,0c2.327,9.309,4.655,17.455,9.309,25.6h54.691 c-1.164-1.164-1.164-1.164-2.327-2.327l74.473-43.055l74.473,43.055c0,1.164-1.164,1.164-1.164,2.327h54.691 c3.491-8.145,6.982-16.291,9.309-25.6l36.073-9.309v-46.545l-39.564-9.309C411.927,301.382,406.109,288.582,397.964,276.945z M267.636,342.109l-74.473,43.055c-4.655-10.473-6.982-23.273-6.982-36.073c0-47.709,36.073-86.109,81.455-91.927V342.109z M279.273,350.255L279.273,350.255L279.273,350.255L279.273,350.255z M365.382,385.164l-74.473-43.055V256 c45.382,5.818,81.455,45.382,81.455,91.927C372.364,361.891,370.036,373.527,365.382,385.164z"></path>
							<path class="cwssvgi_5" style="fill:#D5E3EF;"
                    d="M64,244.364h93.091c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,246.691,60.509,244.364,64,244.364z"></path>
							<path class="cwssvgi_6" style="fill:#D5E3EF;"
                    d="M64,267.636h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,269.964,60.509,267.636,64,267.636z"></path>
							<path class="cwssvgi_7" style="fill:#D5E3EF;"
                    d="M64,290.909h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,293.236,60.509,290.909,64,290.909z"></path>
							<path class="cwssvgi_8" style="fill:#D5E3EF;"
                    d="M64,314.182h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,316.509,60.509,314.182,64,314.182z"></path>
							<path class="cwssvgi_9" style="fill:#D5E3EF;"
                    d="M64,337.455h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,339.782,60.509,337.455,64,337.455z"></path>
							<path class="cwssvgi_10" style="fill:#D5E3EF;"
                    d="M64,360.727h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H64 c-3.491,0-5.818-2.327-5.818-5.818l0,0C58.182,363.055,60.509,360.727,64,360.727z"></path>
							<path class="cwssvgi_11" style="fill:#D5E3EF;"
                    d="M203.636,244.364h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,246.691,200.145,244.364,203.636,244.364z"></path>
							<path class="cwssvgi_12" style="fill:#D5E3EF;"
                    d="M203.636,267.636h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,269.964,200.145,267.636,203.636,267.636z"></path>
							<path class="cwssvgi_13" style="fill:#D5E3EF;"
                    d="M203.636,290.909h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,293.236,200.145,290.909,203.636,290.909z"></path>
							<path class="cwssvgi_14" style="fill:#D5E3EF;"
                    d="M203.636,314.182h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,316.509,200.145,314.182,203.636,314.182z"></path>
							<path class="cwssvgi_15" style="fill:#D5E3EF;"
                    d="M203.636,337.455h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,339.782,200.145,337.455,203.636,337.455z"></path>
							<path class="cwssvgi_16" style="fill:#D5E3EF;"
                    d="M203.636,360.727h104.727c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 H203.636c-3.491,0-5.818-2.327-5.818-5.818l0,0C197.818,363.055,200.145,360.727,203.636,360.727z"></path>
							<path class="cwssvgi_17" style="fill:#B0C4D9;"
                    d="M314.182,366.545c0-3.491-2.327-5.818-5.818-5.818h-73.309l-19.782,11.636h46.545l17.455-10.473 l17.455,10.473h11.636C311.855,372.364,314.182,370.036,314.182,366.545z"></path>
							<polygon class="cwssvgi_18" style="fill:#B0C4D9;"
                       points="302.545,349.091 290.909,342.109 290.909,337.455 267.636,337.455 267.636,342.109 254.836,349.091 278.109,349.091 279.273,349.091 "></polygon>
							<rect class="cwssvgi_19" x="267.636" y="314.182" style="fill:#B0C4D9;" width="23.273"
                    height="11.636"></rect>
							<path class="cwssvgi_20" style="fill:#B0C4D9;"
                    d="M197.818,296.727c0,1.164,1.164,3.491,2.327,4.655c2.327-3.491,4.655-6.982,6.982-10.473h-3.491 C200.145,290.909,197.818,293.236,197.818,296.727z"></path>
							<rect class="cwssvgi_21" x="267.636" y="290.909" style="fill:#B0C4D9;" width="23.273"
                    height="11.636"></rect>
							<rect class="cwssvgi_22" x="267.636" y="267.636" style="fill:#B0C4D9;" width="23.273"
                    height="11.636"></rect>
							<path class="cwssvgi_23" style="fill:#B0C4D9;"
                    d="M197.818,273.455c0,3.491,2.327,5.818,5.818,5.818H217.6c4.655-4.655,10.473-8.145,16.291-11.636 h-30.255C200.145,267.636,197.818,269.964,197.818,273.455z"></path>
							<path class="cwssvgi_24" style="fill:#D5E3EF;"
                    d="M360.727,244.364H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-87.273 c-3.491,0-5.818-2.327-5.818-5.818l0,0C354.909,246.691,357.236,244.364,360.727,244.364z"></path>
							<path class="cwssvgi_25" style="fill:#D5E3EF;"
                    d="M378.182,267.636H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-69.818 c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,269.964,374.691,267.636,378.182,267.636z"></path>
							<path class="cwssvgi_26" style="fill:#D5E3EF;"
                    d="M378.182,290.909H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-69.818 c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,293.236,374.691,290.909,378.182,290.909z"></path>
							<path class="cwssvgi_27" style="fill:#D5E3EF;"
                    d="M378.182,314.182H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-69.818 c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,316.509,374.691,314.182,378.182,314.182z"></path>
							<path class="cwssvgi_28" style="fill:#B0C4D9;"
                    d="M378.182,337.455H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-69.818 c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,339.782,374.691,337.455,378.182,337.455z"></path>
							<path class="cwssvgi_29" style="fill:#B0C4D9;"
                    d="M378.182,360.727H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-69.818 c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,363.055,374.691,360.727,378.182,360.727z"></path>
							<path class="cwssvgi_30" style="fill:#B0C4D9;"
                    d="M450.327,324.655l-36.073-9.309c0-1.164,0-1.164,0-2.327h-36.073c-3.491,0-5.818,2.327-5.818,5.818 s2.327,5.818,5.818,5.818H448C449.164,325.818,450.327,325.818,450.327,324.655z"></path>
							<path class="cwssvgi_31" style="fill:#B0C4D9;"
                    d="M406.109,290.909h-27.927c-3.491,0-5.818,2.327-5.818,5.818c0,3.491,2.327,5.818,5.818,5.818h32.582 C409.6,299.055,407.273,294.4,406.109,290.909z"></path>
							<path class="cwssvgi_32" style="fill:#B0C4D9;"
                    d="M397.964,276.945l5.818-9.309h-25.6c-3.491,0-5.818,2.327-5.818,5.818s2.327,5.818,5.818,5.818 h22.109C399.127,278.109,399.127,276.945,397.964,276.945z"></path>
							<path class="cwssvgi_33" style="fill:#B0C4D9;"
                    d="M360.727,256h50.036l6.982-11.636h-57.018c-3.491,0-5.818,2.327-5.818,5.818 S357.236,256,360.727,256z"></path>
							<rect class="cwssvgi_34" x="58.182" y="128" style="fill:#D5E3EF;" width="395.636" height="93.091"></rect>
							<circle class="cwssvgi_35" style="fill:#F04D4E;" cx="34.909" cy="34.909" r="11.636"></circle>
							<circle class="cwssvgi_36" style="fill:#FFCB5B;" cx="81.455" cy="34.909" r="11.636"></circle>
							<circle class="cwssvgi_37" style="fill:#3BB54A;" cx="128" cy="34.909" r="11.636"></circle>
							<path class="cwssvgi_38" style="fill:#E2E7F0;"
                    d="M477.091,46.545H174.545c-6.982,0-11.636-4.655-11.636-11.636l0,0 c0-6.982,4.655-11.636,11.636-11.636h302.545c6.982,0,11.636,4.655,11.636,11.636l0,0C488.727,41.891,484.073,46.545,477.091,46.545 z"></path>
							<path class="cwssvgi_39" style="fill:#B0C4D8;"
                    d="M87.273,93.091h69.818c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818H87.273 c-3.491,0-5.818-2.327-5.818-5.818l0,0C81.455,95.418,83.782,93.091,87.273,93.091z"></path>
							<path class="cwssvgi_40" style="fill:#B0C4D8;"
                    d="M424.727,93.091H448c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818h-23.273 c-3.491,0-5.818-2.327-5.818-5.818l0,0C418.909,95.418,421.236,93.091,424.727,93.091z"></path>
							<path class="cwssvgi_41" style="fill:#B0C4D8;"
                    d="M378.182,93.091h23.273c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 h-23.273c-3.491,0-5.818-2.327-5.818-5.818l0,0C372.364,95.418,374.691,93.091,378.182,93.091z"></path>
							<path class="cwssvgi_42" style="fill:#B0C4D8;"
                    d="M331.636,93.091h23.273c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818 h-23.273c-3.491,0-5.818-2.327-5.818-5.818l0,0C325.818,95.418,328.145,93.091,331.636,93.091z"></path>
							<path class="cwssvgi_43" style="fill:#B0C4D8;"
                    d="M64,93.091c-3.491,0-5.818,2.327-5.818,5.818l0,0c0,3.491,2.327,5.818,5.818,5.818 c3.491,0,5.818-2.327,5.818-5.818l0,0C69.818,95.418,67.491,93.091,64,93.091z M64,96.582C64,96.582,64,95.418,64,96.582L64,96.582 C64,95.418,64,96.582,64,96.582z"></path>
							<path class="cwssvgi_44" style="fill:#B0C4D9;"
                    d="M302.545,174.545H256l-9.309,39.564l0,0c-8.145,2.327-15.127,4.655-22.109,6.982h110.545 c-6.982-3.491-15.127-5.818-22.109-6.982l0,0L302.545,174.545z"></path>
							<polygon class="cwssvgi_45" style="fill:#B0C4D9;"
                       points="160.582,221.091 192,221.091 172.218,209.455 "></polygon>
							<polygon class="cwssvgi_46" style="fill:#B0C4D9;"
                       points="366.545,221.091 397.964,221.091 386.327,209.455 "></polygon>
							<path class="cwssvgi_47" style="fill:#1470B8;"
                    d="M430.545,360.727v-46.545l-39.564-9.309c-3.491-13.964-9.309-27.927-16.291-39.564l20.945-34.909 l-32.582-32.582l-34.909,20.945c-11.636-6.982-25.6-12.8-39.564-16.291l0,0l-9.309-39.564h-46.545l-9.309,39.564l0,0 c-13.964,3.491-27.927,9.309-39.564,16.291l-34.909-20.945L116.364,230.4l20.945,34.909c-6.982,11.636-12.8,25.6-16.291,39.564 l-39.564,9.309v46.545l39.564,9.309l0,0c3.491,13.964,9.309,27.927,16.291,39.564l-20.945,34.909l32.582,32.582l34.909-20.945 c11.636,6.982,25.6,12.8,39.564,16.291L232.727,512h46.545l9.309-39.564c13.964-3.491,27.927-9.309,39.564-16.291l34.909,20.945 l32.582-32.582L374.691,409.6c6.982-11.636,12.8-25.6,16.291-39.564L430.545,360.727z M256,338.618L256,338.618L256,338.618 L256,338.618z M244.364,245.527v84.945l-74.473,43.055c-4.655-10.473-6.982-23.273-6.982-36.073 C162.909,289.745,198.982,251.345,244.364,245.527z M256,430.545c-30.255,0-57.018-15.127-74.473-37.236L256,350.255l74.473,43.055 C313.018,416.582,286.255,430.545,256,430.545z M342.109,373.527l-74.473-43.055v-86.109c45.382,5.818,81.455,45.382,81.455,91.927 C349.091,350.255,346.764,361.891,342.109,373.527z"></path>
							<path class="cwssvgi_48" style="fill:#3689C9;"
                    d="M256,430.545v11.636c58.182,0,104.727-46.545,104.727-104.727h-11.636 C349.091,388.655,307.2,430.545,256,430.545z"></path>
							<path class="cwssvgi_49" style="fill:#0261A5;"
                    d="M256,244.364v-11.636c-58.182,0-104.727,46.545-104.727,104.727h11.636 C162.909,286.255,204.8,244.364,256,244.364z"></path>
							<circle class="cwssvgi_50" style="fill:#1470B8;" cx="256" cy="337.455" r="23.273"></circle>
							<path class="cwssvgi_51" style="fill:#0261A5;"
                    d="M265.309,316.509c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C279.273,328.145,273.455,320,265.309,316.509z"></path>
							<path class="cwssvgi_52" style="fill:#0261A5;"
                    d="M187.345,399.127l1.164,1.164l0,0c-1.164-1.164-1.164-2.327-2.327-2.327 C186.182,399.127,186.182,399.127,187.345,399.127z"></path>
							<path class="cwssvgi_53" style="fill:#0261A5;"
                    d="M195.491,408.436C195.491,408.436,195.491,407.273,195.491,408.436 c-3.491-3.491-5.818-4.655-8.145-6.982C190.836,403.782,193.164,406.109,195.491,408.436z"></path>
							<path class="cwssvgi_54" style="fill:#0261A5;"
                    d="M176.873,368.873l-6.982,3.491v1.164c2.327,4.655,4.655,9.309,6.982,12.8l1.164,1.164 c1.164,1.164,2.327,3.491,3.491,4.655l3.491-1.164C181.527,384,178.036,377.018,176.873,368.873z"></path>
							<path class="cwssvgi_55" style="fill:#0261A5;"
                    d="M244.364,245.527v13.964c6.982-2.327,15.127-3.491,23.273-3.491v-10.473 c-3.491,0-8.145-1.164-11.636-1.164C252.509,244.364,247.855,244.364,244.364,245.527L244.364,245.527z"></path>
							<path class="cwssvgi_56" style="fill:#0261A5;"
                    d="M181.527,393.309c1.164,2.327,2.327,3.491,4.655,4.655 C185.018,396.8,182.691,394.473,181.527,393.309L181.527,393.309z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">04</i>
                <h3 class="mb-0">Car Rentals Booking</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-mtasvg-init="" class="075-target-3.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                  xml:space="preserve">
							<path class="cwssvgi_0" style="fill:#B06328;"
                    d="M356.073,424.727c-11.636,8.145-23.273,15.127-36.073,20.945l23.273,51.2 c3.491,8.145,12.8,13.964,22.109,13.964l0,0c10.473,0,18.618-8.145,18.618-18.618c0-2.327,0-5.818-1.164-8.145L356.073,424.727z"></path>
							<path class="cwssvgi_1" style="fill:#B06328;"
                    d="M109.382,424.727l-26.764,59.345c-1.164,3.491-1.164,5.818-1.164,9.309 c0,10.473,8.145,18.618,18.618,18.618l0,0c9.309,0,18.618-5.818,22.109-13.964l23.273-51.2 C132.655,441.018,121.018,434.036,109.382,424.727z"></path>
							<path class="cwssvgi_2" style="fill:#B06328;"
                    d="M256,58.182h-46.545V34.909c0-12.8,10.473-23.273,23.273-23.273l0,0 c12.8,0,23.273,10.473,23.273,23.273V58.182z"></path>
							<path class="cwssvgi_3" style="fill:#9F5223;"
                    d="M256,58.182h-23.273V34.909c0-6.982,4.655-11.636,11.636-11.636l0,0 c6.982,0,11.636,4.655,11.636,11.636V58.182z"></path>
							<circle class="cwssvgi_4" style="fill:#F04B4D;" cx="232.727" cy="256" r="209.455"></circle>
							<path class="cwssvgi_5" style="fill:#9F5223;"
                    d="M356.073,424.727c-11.636,8.145-23.273,15.127-36.073,20.945l10.473,23.273 c5.818-2.327,11.636-5.818,16.291-8.145c5.818-3.491,13.964-1.164,16.291,5.818l8.145,17.455c1.164,2.327,1.164,4.655,1.164,8.145 c0,8.145-5.818,16.291-13.964,18.618c2.327,0,3.491,1.164,5.818,1.164l0,0c10.473,0,18.618-8.145,18.618-18.618 c0-2.327,0-5.818-1.164-8.145L356.073,424.727z"></path>
							<path class="cwssvgi_6" style="fill:#9F5223;"
                    d="M109.382,424.727l-4.655,10.473c4.655,3.491,9.309,8.145,13.964,11.636s5.818,9.309,3.491,13.964 l-11.636,25.6c-3.491,8.145-11.636,13.964-22.109,13.964l0,0c-2.327,0-4.655,0-5.818-1.164c2.327,6.982,9.309,12.8,17.455,12.8l0,0 c9.309,0,18.618-5.818,22.109-13.964l23.273-51.2C132.655,441.018,121.018,434.036,109.382,424.727z"></path>
							<path class="cwssvgi_7" style="fill:#DE333F;"
                    d="M437.527,210.618c-1.164-8.145-3.491-15.127-5.818-22.109l-202.473,55.855 c-5.818,1.164-9.309,8.145-8.145,13.964c1.164,3.491,2.327,5.818,5.818,6.982c2.327,2.327,5.818,2.327,9.309,2.327L437.527,210.618z "></path>
							<path class="cwssvgi_8" style="fill:#ECEFF9;"
                    d="M232.727,93.091c-89.6,0-162.909,73.309-162.909,162.909s73.309,162.909,162.909,162.909 S395.636,345.6,395.636,256S322.327,93.091,232.727,93.091z M232.727,372.364c-64,0-116.364-52.364-116.364-116.364 s52.364-116.364,116.364-116.364S349.091,192,349.091,256S296.727,372.364,232.727,372.364z"></path>
							<path class="cwssvgi_9" style="fill:#ECEFF9;"
                    d="M232.727,186.182c-38.4,0-69.818,31.418-69.818,69.818s31.418,69.818,69.818,69.818 S302.545,294.4,302.545,256S271.127,186.182,232.727,186.182z M232.727,290.909c-19.782,0-34.909-15.127-34.909-34.909 s15.127-34.909,34.909-34.909s34.909,15.127,34.909,34.909S252.509,290.909,232.727,290.909z"></path>
							<path class="cwssvgi_10" style="fill:#F6B545;"
                    d="M395.636,93.091l33.745,8.145c8.145,2.327,16.291,0,22.109-5.818l37.236-37.236l-46.545-11.636 L430.545,0l-37.236,37.236c-5.818,5.818-8.145,13.964-5.818,22.109L395.636,93.091z"></path>
							<polygon class="cwssvgi_11" style="fill:#F19920;"
                       points="427.055,101.236 473.6,54.691 448,47.709 401.455,94.255 "></polygon>
							<path class="cwssvgi_12" style="fill:#7F4122;"
                    d="M232.727,267.636c-3.491,0-5.818-1.164-8.145-3.491c-4.655-4.655-4.655-11.636,0-16.291 L457.309,15.127c4.655-4.655,11.636-4.655,16.291,0c4.655,4.655,4.655,11.636,0,16.291L240.873,264.145 C238.545,266.473,236.218,267.636,232.727,267.636z"></path>
							<path class="cwssvgi_13" style="fill:#C4D7E5;"
                    d="M386.327,201.309l-45.382,12.8c2.327,6.982,4.655,15.127,5.818,22.109l45.382-12.8 C390.982,216.436,388.655,208.291,386.327,201.309z"></path>
							<path class="cwssvgi_14" style="fill:#C4D7E5;"
                    d="M302.545,249.018c-1.164-8.145-3.491-15.127-5.818-22.109l-34.909,9.309 c3.491,5.818,5.818,12.8,5.818,19.782c0,1.164,0,1.164,0,2.327L302.545,249.018z"></path>
							<path class="cwssvgi_15" style="fill:#73371B;"
                    d="M232.727,267.636c3.491,0,5.818-1.164,8.145-3.491L473.6,31.418c4.655-4.655,4.655-11.636,0-16.291 L224.582,264.145C226.909,266.473,229.236,267.636,232.727,267.636z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">05</i>
                <h3 class="mb-0">Tours Ticket Booking</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="service-box-wrap">
            <div class="service-box">
						<span class="icon">
							<i class="svg"><svg data-mtasvg-init="" class="091-chat.svg" version="1.1"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                  y="0px" viewBox="0 0 488.727 488.727"
                                  style="enable-background:new 0 0 488.727 488.727;" xml:space="preserve">
							<path class="cwssvgi_0" style="fill:#3689C9;"
                    d="M139.636,151.273c-12.8,0-23.273,10.473-23.273,23.273v232.727v52.364 c0,9.309,8.145,17.455,17.455,17.455l0,0c3.491,0,6.982-1.164,10.473-3.491l75.636-57.018c8.145-5.818,17.455-9.309,27.927-9.309 h217.6c12.8,0,23.273-10.473,23.273-23.273V174.545c0-12.8-10.473-23.273-23.273-23.273H139.636z"></path>
							<path class="cwssvgi_1" style="fill:#1470B8;"
                    d="M465.455,151.273v221.091c0,6.982-4.655,11.636-11.636,11.636H224.582 c-10.473,0-19.782,3.491-27.927,9.309l-75.636,57.018c-1.164,1.164-3.491,2.327-4.655,2.327v6.982 c0,9.309,8.145,17.455,17.455,17.455c3.491,0,6.982-1.164,10.473-3.491l75.636-57.018c8.145-5.818,17.455-9.309,27.927-9.309h217.6 c12.8,0,23.273-10.473,23.273-23.273V174.545C488.727,161.745,478.255,151.273,465.455,151.273z"></path>
							<circle class="cwssvgi_2" style="fill:#EAECED;" cx="302.545" cy="279.273" r="23.273"></circle>
							<circle class="cwssvgi_3" style="fill:#EAECED;" cx="384" cy="279.273" r="23.273"></circle>
							<circle class="cwssvgi_4" style="fill:#EAECED;" cx="221.091" cy="279.273" r="23.273"></circle>
							<path class="cwssvgi_5" style="fill:#C9D5E3;"
                    d="M393.309,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C407.273,269.964,401.455,261.818,393.309,258.327z"></path>
							<path class="cwssvgi_6" style="fill:#C9D5E3;"
                    d="M311.855,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C325.818,269.964,320,261.818,311.855,258.327z"></path>
							<path class="cwssvgi_7" style="fill:#C9D5E3;"
                    d="M230.4,258.327c1.164,3.491,2.327,5.818,2.327,9.309c0,12.8-10.473,23.273-23.273,23.273 c-3.491,0-6.982-1.164-9.309-2.327c3.491,8.145,11.636,13.964,20.945,13.964c12.8,0,23.273-10.473,23.273-23.273 C244.364,269.964,238.545,261.818,230.4,258.327z"></path>
							<path class="cwssvgi_8" style="fill:#0261A5;"
                    d="M232.727,221.091h-17.455l5.818-69.818h23.273v58.182 C244.364,216.436,239.709,221.091,232.727,221.091z"></path>
							<path class="cwssvgi_9" style="fill:#90C962;"
                    d="M0,34.909v116.364c0,12.8,10.473,23.273,23.273,23.273h102.4c9.309,0,18.618,2.327,25.6,8.145 l53.527,36.073c3.491,2.327,5.818,3.491,10.473,3.491l0,0c9.309,0,17.455-8.145,17.455-17.455v-30.255V34.909 c0-12.8-10.473-23.273-23.273-23.273H23.273C10.473,11.636,0,22.109,0,34.909z"></path>
							<path class="cwssvgi_10" style="fill:#71B956;"
                    d="M209.455,11.636v128v29.091c0,9.309-8.145,17.455-17.455,17.455c-3.491,0-6.982-1.164-10.473-3.491 l-32.582-24.436c-5.818-4.655-13.964-6.982-20.945-6.982H0c0,12.8,10.473,23.273,23.273,23.273h102.4 c9.309,0,18.618,2.327,25.6,8.145l53.527,36.073c3.491,2.327,5.818,3.491,10.473,3.491c9.309,0,17.455-8.145,17.455-17.455v-30.255 V34.909C232.727,22.109,222.255,11.636,209.455,11.636z"></path>
							<circle class="cwssvgi_11" style="fill:#EAECED;" cx="116.364" cy="93.091" r="11.636"></circle>
							<circle class="cwssvgi_12" style="fill:#EAECED;" cx="69.818" cy="93.091" r="11.636"></circle>
							<circle class="cwssvgi_13" style="fill:#EAECED;" cx="162.909" cy="93.091" r="11.636"></circle>
							<path class="cwssvgi_14" style="fill:#70B7E5;"
                    d="M151.273,238.545v69.818c0,3.491-2.327,5.818-5.818,5.818l0,0c-3.491,0-5.818-2.327-5.818-5.818 v-69.818c0-3.491,2.327-5.818,5.818-5.818l0,0C148.945,232.727,151.273,235.055,151.273,238.545z"></path>
							<path class="cwssvgi_15" style="fill:#B2D890;"
                    d="M23.273,52.364v34.909c0,3.491-2.327,5.818-5.818,5.818l0,0c-3.491,0-5.818-2.327-5.818-5.818V52.364 c0-3.491,2.327-5.818,5.818-5.818l0,0C20.945,46.545,23.273,48.873,23.273,52.364z"></path>
							<path class="cwssvgi_16" style="fill:#70B7E5;"
                    d="M139.636,331.636L139.636,331.636c0-3.491,2.327-5.818,5.818-5.818l0,0 c3.491,0,5.818,2.327,5.818,5.818l0,0c0,3.491-2.327,5.818-5.818,5.818l0,0C141.964,337.455,139.636,335.127,139.636,331.636z"></path></svg></i>
						</span>
              <div class="service-info">
                <i class="font-style-normal">06</i>
                <h3 class="mb-0">Other</h3>
                <a class="service-btn" href="javascript:void(0);" title="">READ MORE</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- Service Wrap -->
  </section>
  <section>
    <div class="w-100 pt-120 pb-120 position-relative">
      <div id="particles1" class="particles-js top-left" data-color="#ffe27a" data-saturation="300" data-size="40"
           data-count="8" data-speed="2" data-hide="770" data-image="/homepage//"></div>
      <div class="container">
        <div class="about-wrap w-100">
          <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 col-lg-6">
              <img class="img-fluid" src="/homepage/images/banner2.gif" alt="About Mockup">
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
              <div class="about-desc w-100">
                <div class="about-desc w-100">
                  <h2 class="mb-0">
                    Travel agents enjoy the lowest prices possible
                  </h2>
                  <p>we provide multiple suppliers to give you the best selection of Global hotels and Flights at the
                    lowest prices.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- About Style 1 -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-30 bg-color10">
      <div class="service-wrap2">
        <div class="row align-items-center">
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="service-box-wrap2 d-flex flex-wrap align-items-center mb-30">
              <div class="service-img2 overflow-hidden">
                <img class="img-fluid" src="/homepage/images/refundable_option.jpeg" alt="service-img2-1">
              </div>
              <div class="service-info2 text-color12">
                <i class="metaicon-pie-chart text-color8"></i>
                <h4 class="mb-0">Refundable options available</h4>
                <p class="mb-0">PChoose from multiple packages according to your needs. Want to secure the lowest price
                  first and cancel later? Ensure you book the refundable options. </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="service-box-wrap2 d-flex flex-wrap align-items-center mb-30">
              <div class="service-img2 overflow-hidden">
                <img class="img-fluid" src="/homepage/images/low_rates-3.png" alt="service-img2-2">
              </div>
              <div class="service-info2 text-color12">
                <i class="fas fa-star text-color8"></i>
                <h6 class="mb-0">Lowest supplier rates</h6>
                <span class="d-block">No more logging into multiple travel agent portals to compare prices. We compare over 75 suppliers to give you the best rates in the market.</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="service-box-wrap2 d-flex flex-wrap align-items-center mb-30">
              <div class="service-img2 overflow-hidden">
                <img class="img-fluid" src="/homepage/images/multiple_payment_gateway.jpg" alt="service-img2-2">
              </div>
              <div class="service-info2 text-color12">
                <i class="fa fa-credit-card text-color8"></i>
                <h6 class="mb-0">Multiple payment gateways</h6>
                <span class="d-block">Prepaid or postpaid, credit card or bank transfer -- choose your preferred payment method.</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="service-box-wrap2 d-flex flex-wrap align-items-center mb-30">
              <div class="service-img2 overflow-hidden">
                <img class="img-fluid" src="/homepage/images/247_customer_service-1.jpg" alt="service-img2-2">
              </div>
              <div class="service-info2 text-color12">
                <i class="fas fa-phone text-color8"></i>
                <h6 class="mb-0">24/7 Customer Service Support</h6>
                <span class="d-block">Have a question about your booking? Our customer service agents are available 24/7 by email or call us on our toll-free hotline.</span>
              </div>
            </div>
          </div>
        </div>
      </div><!-- Service Wrap Style 2 -->
    </div>
  </section>


  <section>
    <div class="w-100 bg-color5 position-relative pt-100 pb-200">
      <div class="bg-waves">
        <div class="wave wave-top-left">
          <img class="layer" src="/homepage/images/top-left2.png" alt="top-left2">
          <img class="layer" src="/homepage/images/top-left1.png" alt="top-left1">
        </div>
        <div class="wave wave-bottom-right">
          <img class="layer" src="/homepage/images/bottom-right2.png" alt="bottom-right2">
          <img class="layer" src="/homepage/images/bottom-right1.png" alt="bottom-right1">
        </div>
      </div>
      <div class="container">
        <div class="about-wrap2 position-relative w-100">
          <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 col-lg-6">
              <img class="img-fluid" src="/homepage/images/resources/about-mckp2.png" alt="About Mockup">
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
              <div class="about-desc2 w-100">
                <h2 class="mb-0">The best agency</h2>
                <p class="mb-0">We build for you for a B2C and a free B2B booking engine.</p>
                <a class="simple-btn theme-btn fill-btn3" href="/about" title="Read More">Read More</a>
              </div>
            </div>
          </div>
        </div><!-- About Style 2 -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pb-100">
      <div class="container">
        <div class="about-info-wrap mt-ovrlp150 w-100 position-relative">
          <div class="row mrg">
            <div class="col-md-6 col-sm-12 col-lg-6">
              <div class="about-info-cap overflow-hidden w-100"
                   style="background-image: url(/homepage/images/text-bg.jpg);">
                <h2 class="mb-0 text-white">Support <br> <span class="text-color7">more than</span> <br> 20 Languages
                </h2>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
              <img class="img-fluid brd-rd20" src="/homepage/images/banner.gif" alt="Text Image">
            </div>
          </div>
        </div><!-- About Info Wrap -->
      </div>
    </div>
  </section>

  <section>
    <div class="w-100 pt-30 pb-30 position-relative overflow-hidden">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg1.jpg);"></div>
      <div class="container">
        <div class="facts-wrap text-center w-100">
          <div class="row">
            <div class="col-md-4">
              <div class="fact-box text-white brd-rd20 w-100">
                <i class="metaicon-target-1"></i>
                <h6 class="mb-0">Hotels</h6>
                <span><span class="counter">500000</span><sup>+</sup></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fact-box text-white brd-rd20 w-100">
                <i class="metaicon-supermarket"></i>
                <h6 class="mb-0">Airlines</h6>
                <span><span class="counter">700</span><sup>+</sup></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fact-box text-white brd-rd20 w-100">
                <i class="metaicon-medal"></i>
                <h6 class="mb-0">Support</h6>
                <span><span class="">24/7</span></span>
              </div>
            </div>
          </div>
        </div><!-- Facts Wrap -->
      </div>
    </div>
  </section>
  {{-- <section>
    <div class="w-100 pt-100 pb-100 position-relative">
      <div id="particles3" class="particles-js top-left" data-color="#ffe27a" data-saturation="300" data-size="40" data-count="8" data-speed="2" data-hide="770" data-image="/homepage//"></div>
      <div class="container">
        <div class="testi-mckp-wrap w-100">
          <div class="row align-items-center">
            <div class="col-md-12 col-sm-12 col-lg-6 order-1 d-none d-lg-block">
              <img class="img-fluid" src="/homepage/images/resources/testi-mckp.jpg" alt="Testimonials Mockup">
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
              <div class="testi-wrap w-100">
                <div class="testi-caro simple-arrows">
                  <div class="testi-box">
                    <div class="testi-info">
                      <img class="img-fluid rounded-circle" src="/homepage/images/resources/testi-img1-1.png" alt="Testimonial Image 1">
                      <div class="testi-info-inner">
                        <h4 class="mb-0">Ann Statham</h4>
                        <span class="d-block">CEO Pranklin Agency</span>
                      </div>
                    </div>
                    <p class="mb-0">" I have worked with them for a while now. Helped me understand the difference between good content and great content.
  Communication is great as well, which has seemed to be lost in today's time. Look forward to growing my business with them "</p>
                    <span class="d-block star-rating"><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape off"></i></span>
                  </div>
                  <div class="testi-box">
                    <div class="testi-info">
                      <img class="img-fluid rounded-circle" src="/homepage/images/resources/testi-img1-2.png" alt="Testimonial Image 2">
                      <div class="testi-info-inner">
                        <h4 class="mb-0">Peter Doe</h4>
                        <span class="d-block">Manager</span>
                      </div>
                    </div>
                    <p class="mb-0">" Tripser helps businesses with beautifully designed experiences and supports these ideas with coding and good old-fashioned text-based brand, interactive, social or video narratives "</p>
                    <span class="d-block star-rating"><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape off"></i><i class="metaicon-star-in-black-of-five-points-shape off"></i></span>
                  </div>
                  <div class="testi-box">
                    <div class="testi-info">
                      <img class="img-fluid rounded-circle" src="/homepage/images/resources/testi-img1-3.png" alt="Testimonial Image 3">
                      <div class="testi-info-inner">
                        <h4 class="mb-0">Eva</h4>
                        <span class="d-block">Designer</span>
                      </div>
                    </div>
                    <p class="mb-0">" As a startup, you need to find a marketing partner who can help you connect to the right people.
                      They advertise that they can help increase your sales by up to 78% -- they exceeded our expectations. "</p>
                    <span class="d-block star-rating"><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i><i class="metaicon-star-in-black-of-five-points-shape on"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Testimonials With Mockup Wrap -->
      </div>
    </div>
  </section> --}}
  <section>
    <div class="w-100 bg-color5 pt-100 pb-120 position-relative overflow-hidden">
      <div class="bg-waves">
        <div class="wave wave-top-left">
          <img class="layer" src="/homepage/images/top-left2.png" alt="top-left2">
          <img class="layer" src="/homepage/images/top-left1.png" alt="top-left1">
        </div>
        <div class="wave wave-top-right">
          <img class="layer" src="/homepage/images/top-right2.png" alt="top-right2">
          <img class="layer" src="/homepage/images/top-right1.png" alt="top-right1">
        </div>
        <div class="wave wave-bottom-right">
          <img class="layer" src="/homepage/images/bottom-right2.png" alt="bottom-right2">
          <img class="layer" src="/homepage/images/bottom-right1.png" alt="bottom-right1">
        </div>
      </div>
      {{-- <div class="container">
        <div class="sec-title2 mb-70 text-center w-100">
          <div class="d-inline-block">
            <h2 class="mb-0 text-uppercase text-color"><span>Our</span>Plans</h2>
          </div>
        </div><!-- Section Title Style 2 -->
        <div class="pric-wrap text-center w-100">
          <div class="row mrg align-items-center">
            <div class="col-md-4 col-sm-6 col-lg-4">
              <div class="price-table-box radius-left position-relative brd-rd20 w-100 overflow-hidden">
                <span class="d-inline-block brd-rd10"><i class="metaicon-cube"></i>Basic</span>
                <h3 class="mb-0"><sup>$</sup>150 <small>/mo</small></h3>
                <ul class="mb-0 list-unstyled w-100">
                  <li class="position-relative w-100"><strong> Flights/ Hotel/ Bus</strong></li>
                  <li class="position-relative w-100"><strong> B2C Online Booking Portal</strong> (Web/ Android/ ios)</li>
                  <li class="position-relative w-100"><strong>Multiple GDS / 3rd Party API </strong>Integration Available</li>
                  <li class="position-relative w-100"><strong>High User </strong> Experience</li>
                  <li class="position-relative w-100"><strong>Admin</strong> Panel</li>
                  <li class="position-relative w-100"><strong>Multiple Payment Gateway</strong> Integration</li>
                </ul>
                <a class="simple-btn theme-btn fill-btn3" href="javascript:void(0);" title="Buy Now">Buy Now</a>
                <p class="mb-0">By clicking you're accepting <a href="javascript:void(0);" title="">Terms of use</a></p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-lg-4">
              <div class="price-table-box position-relative text-white active brd-rd20 w-100 overflow-hidden">
                <span class="d-inline-block brd-rd10"><i class="metaicon-crown"></i>Coroprate</span>
                <h3 class="mb-0"><sup>$</sup>400 <small>/mo</small></h3>
                <ul class="mb-0 list-unstyled w-100">
                  <li class="position-relative w-100"><strong> Flights/ Hotel/ Bus / Car Rental / Holiday / Activities</strong></li>
                  <li class="position-relative w-100"><strong> B2C & B2B & B2B2C Online Booking Portal</strong> (Web/ Android/ ios)</li>
                  <li class="position-relative w-100"><strong>Multiple GDS Integration / 3rd Party API Integration</strong></li>
                  <li class="position-relative w-100"><strong>High User </strong> Experience</li>
                  <li class="position-relative w-100"><strong>Admin</strong> Panel</li>
                  <li class="position-relative w-100"><strong>Multiple Payment Gateway</strong> Integration</li>
                </ul>
                <a class="icon-btn theme-btn icon-right fill-btn" href="javascript:void(0);" title="Buy Now"><i class="metaicon-028-arrow-metamax"></i>Buy Now<i class="metaicon-028-arrow-metamax"></i></a>
                <p class="mb-0">By clicking you're accepting <a href="javascript:void(0);" title="">Terms of use</a></p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-lg-4">
              <div class="price-table-box radius-right position-relative brd-rd20 w-100 overflow-hidden">
                <span class="d-inline-block brd-rd10"><i class="metaicon-speed"></i>Standard</span>
                <h3 class="mb-0"><sup>$</sup>250 <small>/mo</small></h3>
                <ul class="mb-0 list-unstyled w-100">
                  <li class="position-relative w-100"><strong> Flights/ Hotel/ Bus / Car Rentals</strong></li>
                  <li class="position-relative w-100"><strong> B2C & B2B Online Booking Portal </strong> (Web/ Android/ ios)</li>
                  <li class="position-relative w-100"><strong>Multiple GDS Integration / 3rd Party API Integration</strong></li>
                  <li class="position-relative w-100"><strong>High User </strong> Experience</li>
                  <li class="position-relative w-100"><strong>Admin</strong> Panel</li>
                  <li class="position-relative w-100"><strong>Multiple Payment Gateway</strong> Integration</li>
                </ul>
                <a class="simple-btn theme-btn fill-btn3" href="javascript:void(0);" title="Buy Now">Buy Now</a>
                <p class="mb-0">By clicking you're accepting <a href="javascript:void(0);" title="">Terms of use</a></p>
              </div>
            </div>
          </div>
        </div><!-- Price Table Wrap -->
      </div> --}}
    </div>
  </section>


@endsection
