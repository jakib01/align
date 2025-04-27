@extends('master_layout.candidate_dashboard_master')

@section('job_search')

<style>
    .sidebar {
        position: fixed;
        top: 100px;
        bottom: 60px;
        overflow-y: auto;
        z-index: 99;
    }

    .card-title {
        padding: 0;
    }

    .job-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card {
        flex: 1;
        display: flex;
        flex-direction: column;
        border: 1px solid #e0e0e0;
        border-radius: 0.25rem;
        transition: box-shadow 0.3s ease;
        min-height: 320px;
        max-height: 400px;
        margin: 1rem;
        overflow: hidden;
    }

    .card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }


    .bg-light-blue {
        background-color: #add8e6;
    }

    #right-container {
        transition: top 0.3s ease, width 0.3s ease;
        position: relative;
    }

    #job-details-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0,
                0,
                0,
                0.5);
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-height: 80%;
        overflow-y: auto;
        background-color: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .modal-header {
        display: sticky;
        justify-content: space-between;
        align-items: center;
        background-color: #f8f9fa;
        padding: 15px;
        width: 100%;
        box-sizing: border-box;
    }

    .modal-body {
        padding: 20px;
    }

    .btn-apply,
    .btn-save {
        margin-left: 10px;
    }

    .title-font {
        font-weight: bold;
        color: #2e65af;
    }    
</style>

<main id="main" class="main">
  <div class="container my-4">
    <div class="row mb-3 align-items-center">
      <div class="col-lg-6">
        <div class="input-group" style="height: 38px;">
          <span class="input-group-text border-0" style="height: 38px; background: transparent;">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" class="form-control border-0" placeholder="Keywords..." aria-label="Keywords..." style="height: 38px; background: transparent;" />
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="contractTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Contract
          </button>
          <ul class="dropdown-menu" aria-labelledby="contractTypeDropdown">
            <li><a class="dropdown-item" href="#">Full-time</a></li>
            <li><a class="dropdown-item" href="#">Part-time</a></li>
            <li><a class="dropdown-item" href="#">Contract</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="payTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Pay
          </button>
          <ul class="dropdown-menu" aria-labelledby="payTypeDropdown">
            <li><a class="dropdown-item" href="#">£30,000 - £50,000</a></li>
            <li><a class="dropdown-item" href="#">£50,000 - £70,000</a></li>
            <li><a class="dropdown-item" href="#">£70,000 - £100,000</a></li>
            <li><a class="dropdown-item" href="#">£100,000+</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="coreSkillsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Core Skills
          </button>
          <ul class="dropdown-menu p-3" aria-labelledby="coreSkillsDropdown" style="width: 300px;">
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Leadership" id="skillLeadership">
                <label class="form-check-label" for="skillLeadership">Leadership</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Communication" id="skillCommunication">
                <label class="form-check-label" for="skillCommunication">Communication</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Problem Solving" id="skillProblemSolving">
                <label class="form-check-label" for="skillProblemSolving">Problem Solving</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Teamwork" id="skillTeamwork">
                <label class="form-check-label" for="skillTeamwork">Teamwork</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Critical Thinking" id="skillCriticalThinking">
                <label class="form-check-label" for="skillCriticalThinking">Critical Thinking</label>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row mb-3 align-items-center">
      <div class="col-lg-6">
        <div class="input-group" style="height: 38px;">
          <span class="input-group-text border-0" style="height: 38px; background: transparent;">
            <i class="bi bi-geo-alt"></i>
          </span>
          <input type="text" class="form-control border-0" placeholder="Location..." aria-label="Location..." style="height: 38px; background: transparent;" />
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="technicalSkillsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 58px;">
            Technical Skills
          </button>
          <ul class="dropdown-menu p-3" aria-labelledby="technicalSkillsDropdown" style="width: 300px;">
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cloud Computing" id="skillCloudComputing">
                <label class="form-check-label" for="skillCloudComputing">Cloud Computing</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Web Development" id="skillWebDevelopment">
                <label class="form-check-label" for="skillWebDevelopment">Web Development</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cybersecurity" id="skillCybersecurity">
                <label class="form-check-label" for="skillCybersecurity">Cybersecurity</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Database Management" id="skillDatabaseManagement">
                <label class="form-check-label" for="skillDatabaseManagement">Database Management</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="DevOps" id="skillDevOps">
                <label class="form-check-label" for="skillDevOps">DevOps</label>
              </div>
            </li>
          </ul>
        </div>
       </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="benefitTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Benefits
          </button>
          <ul class="dropdown-menu" aria-labelledby="benefitTypeDropdown">
            <li><a class="dropdown-item" href="#">Performance Bonus</a></li>
            <li><a class="dropdown-item" href="#">Pension</a></li>
            <li><a class="dropdown-item" href="#">Life Assurance</a></li>
            <li><a class="dropdown-item" href="#">2 Weeks Work from Anywhere</a></li>
            <li><a class="dropdown-item" href="#">Private Medical Cover</a></li>
            <li><a class="dropdown-item" href="#">Extended Parental Leave</a></li>  
          </ul>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary w-100" type="button" id="sponsorshipTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Sponsorship
          </button>
          <ul class="dropdown-menu" aria-labelledby="sponsorshipTypeDropdown">
            <li><a class="dropdown-item" href="#">Yes</a></li>
            <li><a class="dropdown-item" href="#">No</a></li>
          </ul>
        </div>
</div>
     <div class=" mt-2 col-lg-2">
        <button class="btn btn-primary w-100" type="button" style="height: 38px;">Search</button>
      </div>
</div>

    <div class="d-flex justify-content-center">
        <div class="input-group w-75 mt-0 mx-auto">
        </div>
    </div>
<ul class="nav nav-tabs mt-4" id="jobRecommendationsTab">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Job Recommendations</button>
    </li>
</ul>
<section class="listings container mt-4">
    <div class="carousel-container position-relative">
        <button class="carousel-control-prev" type="button" data-bs-target="#jobRecommendationsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#jobRecommendationsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div id="jobRecommendationsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <ul class="listings__grid d-flex m-0" style="padding-left: 10px; padding-right: 7px;">
            <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://logo.clearbit.com/google.com" alt="" class="card__logo" width="64" height="64" /> -->
                    </div> 
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Software Engineer</div>
                        <div class="card__text" style="margin-top: 5px;">Google</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">London</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£80,000 - £100,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">             
                        <a href="" class="btn btn-primary">views</a>   
   <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                        </div>
                        </li>
                        <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card__logo-container" style="margin-right: 15px;">
        <!-- <img src="https://logo.clearbit.com/amazon.com" alt="" class="card__logo" width="64" height="64" /> -->
    </div>
    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Senior Software Engineer</div>
                        <div class="card__text" style="margin-top: 5px;">Amazon</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Liverpool</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£70,000 - £90,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">          
            <button class="btn btn-primary btn-sm" style="padding: 5px 10px;" onclick=""> View</button>
            <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
            <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
        </div>
</li>
<li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
<div class="card__logo-container" style="margin-right: 15px;">
<!-- <img src="https://logo.clearbit.com/tcs.com" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Web Developer</div>
                        <div class="card__text" style="margin-top: 5px;">TCS</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Bath</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£60,000 - £80,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">            
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>           
                 <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="carousel-item">
            <ul class="listings__grid d-flex m-0" style="padding-left: 10px; padding-right: 10px;">
            <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Web Developer</div>
                        <div class="card__text" style="margin-top: 5px;">Oracle</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Bath</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£60,000 - £80,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">            
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>
                            <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
                <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Software Developer</div>
                        <div class="card__text" style="margin-top: 5px;">Microsoft</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">London</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£60,000 - £80,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">           
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>              
              <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
                <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Software Developer</div>
                        <div class="card__text" style="margin-top: 5px;">Microsoft</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Liverpool</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£40,000 - £60,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">              
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>         
                   <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="carousel-item">
            <ul class="listings__grid d-flex m-0" style="padding-left: 10px; padding-right: 10px;">
            <li class="card" style="padding: 20px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 10px; width: 100%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Software Engineer</div>
                        <div class="card__text" style="margin-top: 5px;">AMD</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">London</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£30,000 - £40,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">            
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>                   
         <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
                <li class="card" style="padding: 10px; margin-right: 5px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 5px; width: 100%;">
                    <div class="card__logo-container" style="margin-right: 15px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Devops Engineer</div>
                        <div class="card__text" style="margin-top: 5px;">Microsoft</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Liverpool</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£50,000 - £60,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">          
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
</button>                  
          <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
                <li class="card" style="padding: 10px; margin-right: 15px; display: flex; flex-direction: row; align-items: center; border: 1px solid #ddd; border-radius: 5px; width: 100%;">
                    <div class="card__logo-container" style="margin-right: 5px;">
                        <!-- <img src="https://via.placeholder.com/64" alt="" class="card__logo" width="64" height="64" /> -->
                    </div>
                    <div class="card__content" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                        <div class="card__heading" style="font-weight: bold;">Software Developer</div>
                        <div class="card__text" style="margin-top: 5px;">Microsoft</div>
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="seniority-text">Liverpool</span>
                    </p>  
                        <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">£40,000 - £60,000</span>
                    </p>                      
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 12px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>  
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 12px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                        <div class="card__actions" style="margin-top: 10px; display: flex; gap: 10px;">          
                        <button class="btn btn-primary btn-sm" style="padding: 5px 10px;"
    onclick="">
    View
                </button>        
                    <button class="btn btn-secondary btn-sm" style="padding: 5px 10px;">Save</button>
                        <button class="btn btn-success btn-sm" style="padding: 5px 10px;">Apply</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container my-4">
<div class="d-flex justify-content-center">
        <div class="input-group w-75 mt-0 mx-auto">
        </div>
    </div>
<ul class="nav nav-tabs mt-4" id="jobAllTab">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">All Jobs</button>
    </li>
</ul>
    <div class="row">
        @foreach($jobs as $row)
        <div class="col-md-4 job-card mb-3" data-title="Software Engineer" data-location="New York, NY"
            data-type="Full-Time" data-company="X Corp." data-experience="Mid-Level"
            data-salary="£80,000 - £100,000"
            data-description=""
            data-requirements="Requirement 1, Requirement 2, Requirement 3"
            data-benefits="Benefit 1, Benefit 2, Benefit 3">
            <div class="card flex-fill" style="padding: 20px; border: 1px solid #ddd; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" >
                <div class="card-body" >
                    <div class="d-flex justify-content-between align-items-center mb-1 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="assets/img/images/xlogo.png" alt="" class="img-fluid" style="
                                width: 64px;
                                height: 64px;
                                object-fit: cover;
                                border-radius: 5px;
                            " />
                            <h6 class="ms-2 mb-0" style="font-size: 14px; font-weight: bold;">{{ $row->title }}</h6>
                        </div>
                    </div>
                    <h5 class="card-title mt-2 mb-2" style="font-size: 18px; font-weight: bold;">{{ $row->job_title }}</h5>
                    <p class="card-text text-muted mb-0" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="location-text">{{ $row->job_location}}</span>
                        <span class="mx-1">|</span>
                        <span>{{ $row->job_location }}</span>
                    </p>
                    <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">{{ $row->salary_range}}</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 10px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>
                        <span class="me-1">|</span>
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 10px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">Full-Time</span>
                        </span>
                    </div>
                    <p class="card-text mt-3 mb-1" style="font-size: 14px;">
                        <span class="description-text" id="description1">{{ $row->description}}</span>
                        <span id="read-more1" class="text-primary" style="cursor: pointer; display: none"
                            onclick="showFullDescription('description1', 'read-more1', 'Software Engineer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus laudantium neque earum, suscipit quo illum dolores obcaecati architecto? Animi, praesentium?')">
                            Read more</span>
                    </p>
                    <button class="btn btn-primary mt-2" onclick="showJobDetails(event)">Details</button>
                    <button class="btn btn-info mt-2"
    onclick="showScoresModal(this)"
    data-behaviour='{"Leadership":80,"Communication":70,"Problem Solving":90,"Teamwork":85,"Critical Thinking":75}'
    data-values='{"Integrity":88,"Respect":77,"Innovation":92,"Accountability":81,"Collaboration":79}'>
    Check Score
</button>

                




                    

                </div>
                

            </div>
        </div>
        @endforeach
    </div>
</div>
           

    <!-- Job Details Modal -->
    <div id="job-details-modal">
        <div class="modal-content">
            <!-- Header Section -->
            <div class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="" alt="Logo" class="img-fluid me-2" style="width: 40px; height: auto" id="modal-logo" />
                    <div>
                        <p class="text-muted mb-0" id="job-company-name"></p>
                        <h5 class="modal-title mb-0 title-font" id="job-title">
                            <strong></strong>
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-success btn-apply me-2">
                        <i class="bi bi-check-circle"></i> Apply
                    </button>
                    <button class="btn btn-light btn-save me-2">
                        <i class="bi bi-heart"></i> Save
                    </button>
                </div>
            </div>
            <div class="modal-subtitle mb-2 ms-3 mt-2 text-muted d-flex justify-content-start">
                <i class="bi bi-geo-alt me-2"></i>
                <span id="job-location"></span>

                <span class="mx-1">|</span>

                <i class="bi bi-laptop me-2"></i>
                <span>Remote</span>
            </div>
            <div class="d-flex justify-content-between ms-3 mb-2">
                <div>
                    <div>
                        <i class="bi bi-star"></i>
                        <span class="text-muted" id="job-experience"></span>

                        <span class="mx-1">|</span>
                        <i class="bi bi-briefcase"></i>
                        <span class="text-muted" id="job-type"></span>
                    </div>
                </div>
            </div>
            <div class="d-flex ms-3">
                <i class="bi bi-cash me-2"></i>
                <span class="text-muted" id="job-salary"></span>
            </div>
            <div class="modal-body">
                <hr class="mb-3 mt-0" />

                {{-- <div class="charts-section text-center">
                    <h5>Behavior Chart</h5>
                    <canvas id="modalRadarChart" style="max-height: 300px; margin-bottom: 30px;"></canvas>
                
                    <h5>Value Chart</h5>
                    <canvas id="modalValueChart" style="max-height: 300px;"></canvas>
                </div> --}}
                

                <p class="modal-text">
                    <strong> Description:</strong>
                    <span id="job-description"></span>
                </p>
                <p class="modal-text">
                    <strong>Requirements:</strong> <span id="job-requirements"></span>
                </p>
                <p class="modal-text">
                    <strong>Benefits:</strong> <span id="job-benefits"></span>
                </p>
                
                <!-- <p class="modal-text">
                    <strong>About Us:</strong> <span id="job-aboutus"></span>
                </p> -->
                <!-- <p class="modal-text">
                    <strong>Application Deadline:</strong>
                    <span id="job-deadline"></span>
                </p> -->
                <!-- <p class="modal-text">
                    <strong>Visa Sponsorship:</strong>
                    <span id="job-sponsorship"></span>
                </p> -->
            </div>

            <!-- Scores Modal -->



            
        </div>

        
    </div>

   <!-- Scores Modal -->
<div id="scores-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
                <h5 class="modal-title">Assessment Scores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="charts-section text-center">
                    <h5>Behavior Chart</h5>
                    <canvas id="modalRadarChart" style="max-height: 300px; margin-bottom: 30px;"></canvas>

                    <h5>Value Chart</h5>
                    <canvas id="modalValueChart" style="max-height: 300px;"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>


</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const scoresModalEl = document.getElementById('scores-modal');

scoresModalEl.addEventListener('hide.bs.modal', function () {
    document.activeElement.blur(); // Unfocus the canvas or any focused element
});

</script>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<script>
    function showJobDetails(event) {
        const jobCard = event.currentTarget.closest(".job-card");
        const title = jobCard.getAttribute("data-title");
        const location = jobCard.getAttribute("data-location");
        const type = jobCard.getAttribute("data-type");
        const company = jobCard.getAttribute("data-company");
        const experience = jobCard.getAttribute("data-experience");
        const salary = jobCard.getAttribute("data-salary");
        const description = jobCard.getAttribute("data-description");
        const requirements = jobCard.getAttribute("data-requirements");
        const benefits = jobCard.getAttribute("data-benefits");
        const logo = jobCard.querySelector("img").src; 

        document.getElementById("modal-logo").src = logo; 
        document.getElementById("job-title").innerText = title;
        document.getElementById("job-location").innerText = location;
        document.getElementById("job-type").innerText = type;
        document.getElementById("job-experience").innerText = experience;
        document.getElementById("job-salary").innerText = salary;
        document.getElementById("job-description").innerText = description;
        document.getElementById("job-requirements").innerText = requirements;
        document.getElementById("job-benefits").innerText = benefits;
        document.getElementById("job-company-name").innerText = company;

        document.getElementById("job-details-modal").style.display = "block";
    }

    function hideJobDetails() {
        document.getElementById("job-details-modal").style.display = "none";
    }

    window.onclick = function (event) {
        const modal = document.getElementById("job-details-modal");
        if (event.target == modal) {
            hideJobDetails();
        }
    };
    function showFullDescription(
        descriptionId,
        readMoreId,
        title,
        fullDescription
    ) {
        document.getElementById(descriptionId).innerText = fullDescription;
        document.getElementById(readMoreId).style.display = "none"; 
        document.getElementById(descriptionId).style.cursor = "default"; 
    }
</script>

   <!-- Bootstrap Bundle with Popper.js -->
   {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script>
   function loadChartsInScoresModal(behaviourScores, valueScores) {
    const behaviorLabels = Object.keys(behaviourScores || {});
    const behaviorData = Object.values(behaviourScores || {});

    const ctxBehavior = document.getElementById('modalRadarChart').getContext('2d');
ctxBehavior.clearRect(0, 0, ctxBehavior.canvas.width, ctxBehavior.canvas.height);

    
    if (window.modalRadarChart && typeof window.modalRadarChart.destroy === 'function') {
        window.modalRadarChart.destroy();
    }
    
    window.modalRadarChart = new Chart(ctxBehavior, {
        type: 'radar',
        data: {
            labels: behaviorLabels,
            datasets: [{
                label: 'Behavior Assessment',
                data: behaviorData,
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true,
                    suggestedMax: 100
                }
            }
        }
    });

    const valueLabels = Object.keys(valueScores || {});
    const valueData = Object.values(valueScores || {});

    const ctxValue = document.getElementById('modalValueChart').getContext('2d');
ctxValue.clearRect(0, 0, ctxValue.canvas.width, ctxValue.canvas.height);

    
    if (window.modalValueChart && typeof window.modalValueChart.destroy === 'function') {
        window.modalValueChart.destroy();
    }
    
    window.modalValueChart = new Chart(ctxValue, {
        type: 'radar',
        data: {
            labels: valueLabels,
            datasets: [{
                label: 'Value Assessment',
                data: valueData,
                fill: true,
                backgroundColor: 'rgba(133, 250, 240, 0.2)',
                borderColor: 'rgb(68, 242, 248)',
                borderWidth: 3
            }]
        }
    });
}

    </script>

<script>
    function showScoresModal(button) {
    const behaviourScores = JSON.parse(button.getAttribute('data-behaviour'));
    const valueScores = JSON.parse(button.getAttribute('data-values'));

    loadChartsInScoresModal(behaviourScores, valueScores);

    const modalElement = document.getElementById('scores-modal');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
}


    </script>
    
    

    
    
 



@endsection

{{-- <script>

function showScoresModal(button) {
    const behaviourScores = JSON.parse(button.getAttribute('data-behaviour'));
    const valueScores = JSON.parse(button.getAttribute('data-values'));

    loadChartsInScoresModal(behaviourScores, valueScores);

    const modalElement = document.getElementById('scores-modal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalElement); // IMPORTANT
    modal.show(); // show the modal properly
}


</script> --}}