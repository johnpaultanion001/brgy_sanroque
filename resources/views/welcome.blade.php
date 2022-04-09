@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 

    <div class="section">
      <div class="container">
        <div class="title">
            <h2  class="title text-dark">Announcements</h2>
        </div>
        @foreach($announcements as $announcement)
          <article class="view postcard light blue" view="{{  $announcement->id ?? '' }}">
              
              <img class="postcard__img"src="{{URL::asset('/assets/img/announcements/'.$announcement->image)}}" alt="Image Title" />

              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue">{{$announcement->title}}</h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ $announcement->created_at->format('F d,Y h:i A') }} <i class="fas fa-user ml-2 mr-2"></i>{{  $announcement->user->name ?? '' }}
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">  {{\Illuminate\Support\Str::limit($announcement->body,150)}}
                </div>
                <ul class="postcard__tagbox">
                  <button type="button" name="view" id="view" view="{{  $announcement->id ?? '' }}" class="view tag__item"><i class="fas fa-eye fa-lg p-2"></i>View Announcement</button>
                </ul>
            </div>
          </article>
        @endforeach
      </div>
    </div>

<div class="section section-about" id="about">
  <div class="container tim-container">
    <!--     	        typography -->
    <div id="typography" class="cd-section">
      <div class="title">
        <h3 class=" title text-dark">ABOUT {{ trans('panel.site_title') }} </h3>
      </div>
      <div class="row">
      
      <div class="row">
      <div class="col-md-12 mr-auto ml-auto">
        <!-- Carousel Card -->
        <div class="card card-raised card-carousel">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> 
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100"   src="../assets/img/brgy/bg1.jpg" alt="1 slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="text-dark font-weight-bold">
                    
                  </h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/brgy/bg2.jpg" alt="2 slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="font-weight-bold shadow-lg rounded" style="background:#6f0000;" >
                    BARANGAY HEALTH WORKERS
                  </h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100"  src="../assets/img/brgy/bg3.jpg" alt="3 slide">
                <div class="carousel-caption d-none d-md-block">
                <h2 class="font-weight-bold shadow-lg rounded" style="background:#6f0000;" >
                    BARANGAY LUPON 
                  </h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100"  src="../assets/img/brgy/bg4.jpg" alt="4 slide">
                <div class="carousel-caption d-none d-md-block">
                <h2 class="font-weight-bold shadow-lg rounded" style="background:#6f0000;" >
                    SANGGUNIANG BARANGAY MEMBERS 
                  </h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100"  src="../assets/img/brgy/bg7.jpg" alt="5 slide">
                <div class="carousel-caption d-none d-md-block">
                <h2 class="font-weight-bold shadow-lg rounded" style="background:#6f0000;" >
                    BARANGAY PEACE AND ORDER DEPARTMENT
                  </h2>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="material-icons">keyboard_arrow_left</i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="material-icons">keyboard_arrow_right</i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- End Carousel Card -->
      </div>
    </div>
    <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="title">
              <h3 class="font-weight-bold text-dark">Vision:</h3>
          </div>
            <div class="blockquote undefined text-dark pt-2" style="font-size: 20px">
              <p>
                An Independent and progressive barangay advocating principles and practices of good governance that help build and nurture honesty responsibility among its public officials and employee and take appropriate measures to promote transparency in transacting with the public.
              </p>
            </div>
        
      </div>
      <div class="col-md-6">
        <div class="title">
            <h3 class="font-weight-bold text-dark">Mission:</h3>
        </div>
            <div class="blockquote undefined text-dark pt-2" style="font-size: 20px">
              <p>
                To be able to actively carry out the mandates and ensure transparency, honesty and efficiency in the delivery of services in the barangay.
              </p>
            </div>
        
      </div>
    </div>
  </div>

    <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="title">
                    <h3 class="text-center font-weight-bold text-dark">BRIEF HISTORY OF BARANGAY SAN ROQUE CAINTA RIZAL</h3>
                </div>
                  <p class="text-dark text-justify" style="font-size: 20px">
                  BARANGAY SAN ROQUE was established on 1963 and the barrio lieutenant (Tiniente Del Baryo) was appointed by the Municipal Mayor through the recommendation of Municipal Councilor. This creation was based on RA 3590 and was categorized as URBAN barangay with a land are 66.99 hectares with a total population of 8,342 as of 2009 (4,433-female & 3,909-male) with total households of 2,126 and with a total registered voters of 4,746.
                  <br><br>
                  The barangay basic utilities like power supply is from MERALCO and water were coming from the first level Manila Water. Our way of transportation are mobil/patrol and motorcycle, we provide our communication by way of telephone and mobile. The barangay revenues are coming from Local Source, IRA and other barangay generating income.

                  </p>
              </div>
              <div class="col-md-12">
                <div class="title">
                    <h4 class="font-weight-bold text-dark">BARANGAY SAN ROQUE was composed of the following personnel:</h4>
                </div>
                <div class="row">
                  <div class="col-md-6 text-dark" style="font-size: 20px">
                        1 Punong Barangay  <br>
                        7 Barangay Kagawads  <br>
                        1 SK-Chairperson  <br>
                        1 Brgy. Treasurer  <br>
                        8 Brgy. Staffs  <br>
                        12 Environmental Crews   <br>
                  </div>
                  <div class="col-md-6 text-dark" style="font-size: 20px">
                          18 Barangay Tanods    <br>
                          23 BHW    <br>
                          1 Daycare Worker    <br>
                          10 Volunteer Barangay Lupon    <br>
                          18 Volunteer Brgy. Tanods    <br>
                          7 SK Kagawads  <br>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
      
        
        </div>
      </div>
    
    
      
    </div>
</div>

<div class="section" style="background: #F5F5F5;">
  <div class="container">
    <div class="col-md-12 mt-4 text-left" >
      
      <div class="title text-dark  text-center">
          <h5 class="font-weight-bold" style="font-size: 20px">LIST OF OFFICIALS</h5>
      </div>
      <div class="title text-dark" >
          <h5 class="font-weight-bold" >FELIX C. TAGUBA III</h5>
          <h5 class="font-weight-light">Punong Barangay</h5>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title text-dark">
          <h5 class="font-weight-bold">BENJAMIN S. ZAPANTA, JR.</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light">Kagawad- Committee on:</h5></div>
            <div class="col-6"><h5 class="font-weight-light">MEMBERS</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light">Rules, Resolutions and Ordinances</h5></div>
            <div class="col-6"><h5 class="font-weight-light">Kag. June Laranang and Kag. Gregorio C. Cruz, Jr.</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light">Finance and Appropriations</h5></div>
            <div class="col-6"><h5 class="font-weight-light">Kag. June Laranang and Kag. Gregorio C. Cruz, Jr.</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">JERICO J. SANTOS</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Peace & Order and Human Rights</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta, Jr., Kag. June Laranang</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Transportation & Communication</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Willy Sta. Maria, Kag. Rodel Costoy</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">GREGORIO C. CRUZ, JR.</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Public Works and Infrastracture</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta, Jr., Kag. Jericho J. Santos</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">WILLY C. STA. MARIA</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Ways and Means</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Jericho J. Santos, Kag. Gregorio C. Cruz, Jr.</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Commerce, Trade & Industries</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta, Jr., Kag. Gregorio C. Cruz, Jr</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">RODEL M. COSTOY</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Education & Culture</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. June Laranang, Kag. Maria Kaela Cruz</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">JUNE L. LARANANG</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Environmental Protection</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta Jr., Kag. Jericho J. Santos <br>Kag. Gregorio C. Cruz, Jr.</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">BDRRM</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta, Jr.</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">MARIA KAELA G. CRUZ</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Kagawad- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Health & Social Services</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Jericho J. Santos,Kag. June Laranang</h5></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Women & Family Affairs</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Benjamin S. Zapanta, Jr., Kag. Willy Sta. Maria</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="title">
          <h5 class="font-weight-bold text-dark">JOHN PAUL C. RICARDO</h5>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">SK Chairman- Committee on:</h5></div>
            <div class="col-6"></div>
          </div>
          <div class="row">
            <div class="col-6"><h5 class="font-weight-light text-dark">Youth & Sports Development</h5></div>
            <div class="col-6"><h5 class="font-weight-light text-dark">Kag. Rodel Costoy, Kag. Jerico Santos</h5></div>
          </div>
      </div>
      <hr class="my-2 bg-dark">
      <div class="row">
        <div class="col-6">
          <div class="title">
              <h5 class="font-weight-bold text-dark">RELITA G. BRECIA</h5>
              <h5 class="font-weight-light text-dark">Barangay Secretary</h5>
          </div>
        </div>
        <div class="col-6">
          <div class="title">
              <h5 class="font-weight-bold text-dark">LAURA L. BOLOS</h5>
              <h5 class="font-weight-light text-dark">Barangay Treasurer</h5>
          </div>
        </div>
      </div>
      <hr class="my-2 bg-dark">
      <br>
      <div class="container">
          <div id="navigation-pills">
            <div class="row">
              <div class="col-lg-12">
                
                  
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills nav-pills-icons " role="tablist">
                        <li class="nav-item">
                          <a class="nav-link  active " href="#list_of_subdivisions_of_brgy_san_roque" rel="tooltip" data-original-title="LIST OF SUBDIVISIONS OF BARANGAY SAN ROQUE"  data-placement="top" role="tab" data-toggle="tab">
                              
                              <h5>LIST OF <br> SUBDIVISIONS</h5>
                              
                          </a>
                        </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#list_of_streets_of_brgy_san_roque" role="tab" data-toggle="tab" rel="tooltip" data-original-title="LIST OF STREETS OF BARANGAY SAN ROQUE"  data-placement="top">
                            
                            <h5 >LIST OF <br> STREETS</h5>
                            
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#brgy_awards_and_achievements" role="tab" data-toggle="tab" rel="tooltip" data-original-title="BARANGAY AWARDS AND ACHIEVEMENTS"  data-placement="top">
                          
                          <h5>AWARDS & <br> ACHIEVEMENTS</h5>
                            
                          </a>
                        </li> 
                    </ul>
                  </div>
                  
                
                  
                <div class="tab-content tab-space">
                  
                  <div class="tab-pane active" id="list_of_subdivisions_of_brgy_san_roque">
                    <hr class="my-1 bg-dark">  
                      <div class="title text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">DM 2, 9 AND 10 SUBDIVISION</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">GENESIS ROYALE II SUBDIVISION</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">MADERA I SUBDIVISION</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">ROSE ANN SUBDIVISION</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">ST. CHRISTOPHER SUBDIVISION</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">SUMMERGREEN SUBDIVISION PHASE II</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">VERDER GRANDE</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">BEATRIZ VILLA</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">NORTH 44 </h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-bold text-dark">GREENLAND SUBDIVISION PHASE 7 </h5>
                            </div>
                        </div>
                      </div>
                    <hr class="my-1 bg-dark">
                  </div>
                  
                  <div class="tab-pane" id="list_of_streets_of_brgy_san_roque">
                      <hr class="my-1 bg-dark">  
                        <div class="title text-center">
                          <div class="row">
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">A. BONIFACIO ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">E. GONGORA ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">R. DEL VALLE ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">J. HERNANDEZ ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">PAROLA ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">E. TOLENTINO ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">M. CRUZ ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">A. RODRIGUEZ AVE.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">P. DE GUZMAN ST.</h5>
                              </div>
                              <div class="col-6">
                                  <h5 class="font-weight-bold text-dark">NURSERY ROAD</h5>
                              </div>
                          </div>
                        </div>
                      <hr class="my-1 bg-dark">
                  </div>

                  <div class="tab-pane " id="brgy_awards_and_achievements">
                    <div class="text-left  text-dark text-justify">
                      <p  style="font-size: 18px;">
                        <b>Barangay San Roque Barangay Anti-Drug Abuse Council (BADAC)</b>  continues its mission to reduce level of drug affectation an ultimately achieve drug-free status.
                      </p>
                      <p  style="font-size: 18px;">
                        During the regular session of the Sangguniang Barangay on October 15, 2018 the SB members approved the resolution on putting up of <b><i>“Drug-Free Sticker”</i></b> to every home that is considered free from the influence of illegal drugs. BADAC members started putting up Drug-Free Stickers on November 2, 2018 with the assistance of the Cainta Police Officers.
                      </p>
                      <p  style="font-size: 18px;">
                        <b>On October 19, 2018</b>, Barangay San Roque BADAC started its first <b><i> Simula ng Pag-Asa (SIPAG) </i></b>  program wherein the drug surrenderers undergo 12 days seminar for their reintegration into the society and rebuilding them to become more productive citizens. SIPAG sessions were held at the Barangay San Roque Senior Citizen Hall at DM 2. SPO2 Rodil Demonteverde spearheaded the program since he is an expert in the field, Rev. Michael V. Nabo, CBMM Cainta Church Pastor, assisted him.
                      </p>
                      <p  style="font-size: 18px;">
                        Of the fifty-eight (58) drug surrenderers listed in the file of the barangay, five (5) were issued non-residency certificate since they are either in the province already or nowhere to be found; two (2) were residents of Barangay San Andres and three (3) were already imprisoned. Barangay San Roque send letter of invitation to all of them for them to attend the SIPAG Program but only seventeen (17) attended the first meeting at the barangay on October 15, 2018. However, not all of those who attended the 12 sessions, only ten (10) really complied and were able to graduate last November 19, 2018.
                      </p>
                      <p  style="font-size: 18px;">
                        <b>Barangay San Roque Barangay Anti-Drug Abuse Council (BADAC)</b> hold SIPAG Batch 2 starting March 11, 2019 at Barangay San Roque Senior Citizens Social Hall at DM 2. Letters were sent to 31 surrenderers who were not able to attend SIPAG batch 1 of the 31 surrenderers who were sent letters, only 15 surrenderers complied and attended SIPAG Batch 2. Last session was held on March 27, 2019. SPO2 Rodil Demonteverde spearheaded the program since he is an expert in the field, Rev. Michael V. Nabo, CBMM Cainta Church Pastor and Pstr. Teofilo C. Jornales, Jr. assisted him.
                      </p>
                      <p style="font-size: 18px;">
                        <b>On April 6, 2019</b>, the graduates of SIPAG Batch 2 were required to attend the Barangay San Roque weekly Manila Bay Clean-Up Drive held at Summergreen Phase 2 as a form of community service.
                      </p>
                      <p style="font-size: 18px;">
                        Barangay San Roque prepared all the requirements for Drug-Cleared Barangay with the help of SPO2 Rodil Demonteverde and was able to pass all the requirements and after due deliberation and complete submissions of the requirements compliant to the set of parameters on the barangay drug clearing, the Regional Oversight Committee by way of Regional Committee Resolution No. 321 unanimously confirmed the DRUG CLEARED status of Barangay San Roque, Municipality of Cainta, Province of Rizal.
                      </p>
                      <p style="font-size: 18px;">
                        Barangay San Roque also submitted all the requirements and is just waiting for the official certification for establishing <b><i>“Community Mobilizing Project.”</i></b>
                      </p>
                      <p style="font-size: 18px;">
                        Barangay San Roque received from <b><i>CADAC Certificate of Appreciation</i></b>  for valuable support and contribution to the ongoing fight against illegal drugs and Certificate of Compliance for being fully compliant with early submission of reports and requirement set forth by the Cainta Anti-Drug Abuse Council for continuous implementation of anti-drug abuse programs and activities in the municipality.
                      </p>
                    </div>
                  
                    <div class="title text-left text-dark">
                        <div class="row">
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-bold">Name of Subdivision</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-bold">No. of Residents</h5>
                            </div>
                            
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">DM 2, 9 and 10 Subdivision</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">318</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Genesis Royale ii Subdivision</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">114</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Madera I Subdivision</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">866</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Rose Ann Subdivision </h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">382</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">St. Christopher Subdivision </h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">185</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Summergreen Subdivision Phase II</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">60</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Verde Grande Subdivision</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">115</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">Greenland Subdivision Phase 7</h5>
                            </div>
                            <div class="col-6" style="border: 1px solid #fff">
                                <h5 class="font-weight-light">456</h5>
                            </div>
                        </div>
                          <br>
                          <div class="title">
                            <h5 class="font-weight-bold text-dark">PROPOSED PROGRAMS/PROJECTS FOR INCLUSION IN THE 2019 ANNUAL INVESTMENTS PROGRAM AND 20% DEVELOPMENT FUND</h5>
                          </div>
                        <div class="row">
                          
                            <div class="col-4">
                                <h5 class="font-weight-bold">PROGRAMS/ PROJECT</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-bold">LOCATION</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-bold">BRIEF DESCRIPTION /STATUS <br> /REMARKS</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Rehabilitation of Canals/Drainages</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Parola & M. Cruz St. (1st& 2nd Sts.)</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">To stop/prevent the flow of water during rainy seas</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Cementing of Roads</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">MD 2, 9, 10 Subdivision	</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">to give and provide better service to the people</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Construction of Multi-Purpose Hall</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">R. Del Valle St.</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">to have a pleasant and comfortable facility for the rest</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Repair/Improvement of Barangay Hall</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Amang Rodriguez Avenue</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">to have a comfortable and a safe a sound workplace for both employees and constituents </h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Improvement of Madera I Multipurpose Hall</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">Madera I Subdivision	</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">to have a pleasant and comfortable facility for the rest</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">CCTV Cameras in Strategic Areas</h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light"></h5>
                            </div>
                            <div class="col-4">
                                <h5 class="font-weight-light">to ensure security of the constituents</h5>
                            </div>
                          
                            <div class="col-4 mt-5">
                                <h5 class="font-weight-light">Prepared and Submitted By:</h5>
                                <h5 class="font-weight-light">HON. FELIX C. TAGUBA III</h5>
                                <h5 class="font-weight-light">Punong Barangay</h5>
                              </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
    </div>
  </div>
    
</div>




<div class="container">
<h3 class="text-center title text-dark">BARANGAY ORGANIZATIONAL CHART</h3>
    <a href="../assets/img/brgy/brgy_chart.JPG">
      <div class="card border-0 brgy_chart">
          <img src="../assets/img/brgy/brgy_chart.JPG" alt="BARANGAY ORGANIZATIONAL CHART">
      </div>
    </a>
</div>
   


    <div class="section section-contacts" style="background: #F5F5F5;" id="contact">
        <div class="container">
            <h3 class="text-center title text-dark">Contact Us</h4>
              <div id="navigation-pills">
                <div class="row">
                  <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                      <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#brgy_directory" role="tab" data-toggle="tab">
                            BARANGAY <br> DIRECTORY
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#brief_narrative_description_of_location" role="tab" data-toggle="tab">
                            DESCRIPTION <br>LOCATION
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#landmark_with_brief_description" role="tab" data-toggle="tab">
                            LANDMARK  <br>DESCRIPTION
                          </a>
                        </li>
                      </ul>
                    </div>
                    
                    <div class="tab-content tab-space">
                      
                      <div class="tab-pane active" id="brgy_directory">
                        <hr class="my-1 bg-dark">  
                          <div class="title text-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Barangay Hall Address:	</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark font-weight-light">Amang Rodriquez Avenue, Barangay San Roque Cainta. Rizal</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Barangay E-mail Address: </h5>
                                </div>
                                <div class="col-md-6">
                                    <p class=" font-weight-light text-dark"><a href="#send_us_email" class="text-dark">barangaysanroque@gmail.com</a> </p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Barangay Telephone Numbers:</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class=" font-weight-light text-dark"></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Secretary/Treasurer:	</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class=" font-weight-light text-dark">0927 139 4357</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Information: </h5>
                                </div>
                                <div class="col-md-6">
                                    <p class=" font-weight-light text-dark">0927 139 4357</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold text-dark">Tanod:</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="font-weight-light text-dark">0927 139 4357</p>
                                </div>
                            </div>
                          </div>
                        <hr class="my-1 bg-dark">
                      </div>
                      
                      <div class="tab-pane" id="brief_narrative_description_of_location">
                          <hr class="my-1 bg-dark">  
                            <div class="title text-left">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h5 class="font-weight-bold text-dark">BARANGAY SAN ROQUE is about two (2) Kilometers away from the center of Cainta. It is surrounded by the following barangays:</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <h5 class="font-weight-bold text-dark">Hilaga (North)	:</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="font-weight-light text-dark">Barangay San Juan</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h5 class="font-weight-bold text-dark">Timog (South) :</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="font-weight-light text-dark">Barangay Sto. Domingo</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h5 class="font-weight-bold text-dark">Silangan (East) :</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="font-weight-light text-dark">Barangay San Andres</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h5 class="font-weight-bold text-dark">Kanluran (West) :</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="font-weight-light text-dark">Barangay Santa Rosa</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h5 class="font-weight-bold text-dark">Classification of Barangay :</h5>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="font-weight-light text-dark">Urban</p>
                                  </div>
                              </div>
                            </div>
                          <hr class="my-1 bg-dark">
                      </div>

                      <div class="tab-pane" id="landmark_with_brief_description">
                      <hr class="my-1 bg-dark">  
                        <div class="text-left text-justify">
                              <div class="col-md-12">
                                  <h5 class="font-weight-bold text-dark">Barangay San Roque is near the Diocese of Antipolo Shrine and Parish of Our Lady of Light and Jollibee Parola in Cainta, Rizal.</h5>
                              </div>
                              <div class="col-md-12">
                                  <h5 class="font-weight-bold text-dark">Other landmarks are Savemore, Parola and Cainta Municipal Hospital Maternal and Health Hub “Birthing Home” at Amang Rodriquez Avenue.</h5>
                              </div>
                        </div>
                        <hr class="my-1 bg-dark">  
                      </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
       
  </div>
 

  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <img id="image_ann" style="vertical-align: bottom;"  height="350" width="100%"  data-target="#carouselExample" data-slide-to="0">
        <h4 id="title" class="font-weight-bold"></h4>
        <h5 id="body" class="text-justify"></h5>
          
          <div class="link_website">
            <h4>Click <a id="link_websites" href="/" target="_blank">Here</a>. To More Info.</h4>
          </div>
           
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<script> 
 $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToAbout() {
      if ($('.section-about').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-about').offset().top
        }, 1000);
      }
    }

    function scrollToContact() {
      if ($('.section-contacts').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-contacts').offset().top
        }, 1000);
      }
    }

    $(document).on('click', '.view', function(){
      $('#viewModal').modal('show');
      $('.link_website').hide();
      var id = $(this).attr('view');
      
      $.ajax({
        url :"/view/"+id,
        dataType:"json",
        beforeSend:function(){
           $(".modal-title").text('Loading...');
        },
        success:function(data){
            $(".modal-title").text('View Announcement');
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).text(value)
                }
                if(key == 'link_website'){
                  if(value == null){
                    $('.link_website').hide();
                  }else{
                    $('.link_website').show();
                    $('#link_websites').prop('href' , value);
                  }
                }
                if(key == 'image'){
                  $('#image_ann').prop("src", '/assets/img/announcements/'+ value);
                }
            })
        }
    })

    });
  

</script>
@endsection