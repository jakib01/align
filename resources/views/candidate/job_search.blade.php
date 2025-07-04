@extends('master_layout.candidate_dashboard_master')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const dropdown = this.closest('.dropdown');
                const button = dropdown.querySelector('button');
                button.textContent = this.textContent;
            });
        });
    });
</script>


@section('job_search')

<style>
  .discount-bar {
    display: inline-block;
    background-color: #ffc107; /* Bootstrap warning color */
    color: #000;
    font-size: 12px;
    font-weight: bold;
    padding: 4px 10px;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    letter-spacing: 0.5px;
  }
</style>



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

    /* #job-details-modal {
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
    } */

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
          <input type="text" class="form-control border-0" placeholder="Job Title" aria-label="Job Title" style="height: 38px; background: transparent;" />
        </div>
      </div>
      <div class="col-lg-2">
        <div class="dropdown">
            <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="contractTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
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
          <button class="btn btn-outline-secondary w-100" type="button" id="payTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 58px;">
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
          <button class="btn btn-outline-secondary w-100" type="button" id="sponsorshipTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="height: 38px;">
            Sponsorship
          </button>
          <ul class="dropdown-menu" aria-labelledby="sponsorshipTypeDropdown">
            <li><a class="dropdown-item" href="#">Yes</a></li>
            <li><a class="dropdown-item" href="#">No</a></li>
          </ul>
        </div>
    </div>
      {{-- <div class="col-lg-2">
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
      </div> --}}
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
      {{-- <div class="col-lg-2">
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
    </div> --}}
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 80%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 85%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 90%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 86%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 81%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 95%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 95%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 95%</span>
                        </p>
                        </p>
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
                        <p style="margin: 0;">
                        <p style="margin: 0;">
                        <span class="discount-bar">Aligned Score: 85%</span>
                        </p>
                        </p>
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
        <div class="col-md-4 job-card mb-3" data-title="{{ $row->title }}" data-location="{{ $row->job_location}}"
            data-job_id="{{ $row->id }}"
            data-type="{{$row->working_pattern}}" data-company="{{ $row->company_name }}" data-experience="{{ $row->seniority_level }}"
            data-salary="{{ $row->salary_range}}"
            data-candidate-id="{{ $row->employer_id }}" 
            data-description="{{ $row->description}}"
            data-requirements="{{ $row->requirements }}"
            data-benefits="{{ $row->benefits }}">
            <div class="card flex-fill" style="padding: 20px; border: 1px solid #ddd; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" >
                <div class="card-body" >
                    <div class="d-flex justify-content-between align-items-center mb-1 mt-3">
                        <div class="d-flex align-items-center">
                            {{-- <img src="assets/img/images/xlogo.png" alt="" class="img-fluid" style="
                                width: 64px;
                                height: 64px;
                                object-fit: cover;
                                border-radius: 5px;
                            " /> --}}
                            <h6 class="ms-2 mb-0" style="font-size: 14px; font-weight: bold;">{{ $row->title }}</h6>
                        </div>
                    </div>
                    <h5 class="card-title mt-2 mb-2" style="font-size: 18px; font-weight: bold;">{{ $row->job_title }}</h5>
                    <h4 class="card-title  mb-2" style="font-size: 18px; font-weight: bold;">{{ $row->company_name }}</h4>
                    <p class="card-text text-muted mb-0" style="font-size: 14px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="location-text">{{ $row->job_location}}</span>
                        <span class="mx-1">|</span>
                        <span>{{ $row->job_location }}</span>
                    </p>
                    <p class="card-text text-muted mb-0 mt-1" style="font-size: 14px;">
                        <i class="bi bi-cash"></i>
                        <span class="salary-text">{{ $row->salary_range }}</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-center mt-1">
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-2" style="font-size: 10px;">
                            <i class="bi bi-star me-1"></i>
                            <span class="experience-text text-muted">Mid-Level</span>
                        </span>
                        <span class="me-1">|</span>
                        <span class="badge bg-light-blue text-dark d-flex align-items-center me-1" style="font-size: 10px;">
                            <i class="bi bi-briefcase me-1"></i>
                            <span class="job-type-text text-muted">{{$row->working_pattern}}</span>
                        </span>
                    </div>
                    <p class="card-text mt-3 mb-1" style="font-size: 14px;">
                        <span class="description-text" id="description1">{{ \Illuminate\Support\Str::limit($row->description, 20) }}</span>
                        <span id="read-more1" class="text-primary" style="cursor: pointer; display: none"
                            onclick="showFullDescription('description1', 'read-more1', 'Software Engineer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus laudantium neque earum, suscipit quo illum dolores obcaecati architecto? Animi, praesentium?')">
                            Read more</span>
                    </p>
                    <button class="btn btn-primary mt-2" onclick="showJobDetails(event)">Details</button>
                    {{-- <button class="btn btn-info mt-2"
                        onclick="showScoresModal(this)"
                        data-behaviour='{"Leadership":80,"Communication":70,"Problem Solving":90,"Teamwork":85,"Critical Thinking":75}'
                        data-values='{"Integrity":88,"Respect":77,"Innovation":92,"Accountability":81,"Collaboration":79}'>
                        Check Score
                    </button> --}}
<button class="btn btn-primary mt-2" onclick="CheckScore(event)">Check Score</button>
                




                    

                </div>
                

            </div>
        </div>
        @endforeach
    </div>
</div>
           

    {{-- <!-- Job Details Modal -->
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
                
           
                
            </div>

           



            
        </div>

        
    </div> --}}

   


   <!-- Scores Modal -->
   <!-- Modal Structure -->
<div id="scores-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content">
  
        <div class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
          <h5 class="modal-title">Assessment Scores</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <div class="modal-body">
          <h5 class="text-center">Behavior Comparison</h5>
          <div class="row">
              <div class="col-md-6">
                  <canvas id="chartEmployerBehavior" style="max-height: 300px;"></canvas>
              </div>
              <div class="col-md-6">
                  <canvas id="chartCandidateBehavior" style="max-height: 300px;"></canvas>
              </div>
          </div>
  
          <h5 class="text-center mt-4">Value Comparison</h5>
          <div class="row">
              <div class="col-md-6">
                  <canvas id="chartEmployerValues" style="max-height: 300px;"></canvas>
              </div>
              <div class="col-md-6">
                  <canvas id="chartCandidateValues" style="max-height: 300px;"></canvas>
              </div>
          </div>
  
          <h5 class="text-center mt-4" id="alignmentScoreText"></h5> <!-- Alignment Score Text -->
        </div>
  
      </div>
    </div>
  </div>
  






</main>





<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i>
</a>

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        

      
{{-- <script>
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
</script> --}}







        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchBtn = document.querySelector('.btn.btn-primary.w-100');
            
                searchBtn.addEventListener('click', function () {
                    const keywordInput = document.querySelector('input[placeholder="Job Title"]').value.toLowerCase().trim();
                    const locationInput = document.querySelector('input[placeholder="Location..."]').value.toLowerCase().trim();
                    const contract = document.getElementById('contractTypeDropdown').textContent.trim().toLowerCase();
                    const pay = document.getElementById('payTypeDropdown').textContent.trim().toLowerCase();
                    const sponsorship = document.getElementById('sponsorshipTypeDropdown').textContent.trim().toLowerCase();
            
                    const jobCards = document.querySelectorAll('.job-card');
            
                    jobCards.forEach(card => {
                        const title = card.dataset.title?.toLowerCase() || '';
                        const location = card.dataset.location?.toLowerCase() || '';
                        const type = card.dataset.type?.toLowerCase() || '';
                        const salary = card.dataset.salary?.toLowerCase() || '';
                        const benefits = card.dataset.benefits?.toLowerCase() || '';
            
                        // Matching logic per filter
                        const matchKeyword = !keywordInput || title.includes(keywordInput);
                        const matchLocation = !locationInput || location.includes(locationInput);
                        const matchContract = contract === 'contract' || type.includes(contract);
                        const matchPay = pay === 'pay' || salary.includes(pay);
                        const matchSponsorship = sponsorship === 'sponsorship' || benefits.includes(sponsorship);
            
                        // Show if all active filters match
                        if (matchKeyword && matchLocation && matchContract && matchPay && matchSponsorship) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
            </script>
            
        
    
    

@endsection

 <!-- Job Details Modal -->
<div id="job-details-modal" class="modal fade" tabindex="-1" aria-labelledby="job-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Header Section -->
            <div class="modal-header sticky-top bg-light w-100 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img  id="modal-logo" />
                    {{-- <img src="" alt="Logo" class="img-fluid me-2" style="width: 40px; height: auto" id="modal-logo" /> --}}
                    <div>
                        <p class="text-muted mb-0" id="job-company-name"></p>
                        <h5 class="modal-title mb-0 title-font" id="job-title">
                            <strong></strong>
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button 
                        class="btn btn-success btn-apply me-2"
                        id="applyBtn"
                        data-job_id=""
                        data-title=""
                    >
                        <i class="bi bi-check-circle"></i> Apply
                    </button>
                    <button class="btn btn-light btn-save me-2">
                        <i class="bi bi-heart"></i> Save
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <i class="bi bi-star"></i>
                    <span class="text-muted" id="job-experience"></span>
                    <span class="mx-1">|</span>
                    <i class="bi bi-briefcase"></i>
                    <span class="text-muted" id="job-type"></span>
                </div>
            </div>

            <div class="d-flex ms-3 mb-2">
                <i class="bi bi-cash me-2"></i>
                <span class="text-muted" id="job-salary"></span>
            </div>

            <div class="modal-body">
                <hr class="mb-3 mt-0" />
                <p class="modal-text">
                    <strong>Description:</strong> <span id="job-description"></span>
                </p>
                <p class="modal-text">
                    <strong>Requirements:</strong> <span id="job-requirements"></span>
                </p>
                <p class="modal-text">
                    <strong>Benefits:</strong> <span id="job-benefits"></span>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    let chartEmployerBehavior, chartCandidateBehavior, chartEmployerValues, chartCandidateValues;

    window.CheckScore = function(event) {
        const modalElement = document.getElementById('scores-modal');
        const jobCard = event.currentTarget.closest('.job-card');

        // console.log('jobCard:', jobCard); // Debug log
        const candidate_id = jobCard?.getAttribute('data-candidate-id');
        // console.log('candidate_id:', candidate_id); // Debug log

        // if (!candidate_id) {
        //     console.error("Candidate ID missing.");
        //     return;
        // }

        const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);

        fetch(`/employer/api/get-assessment?candidate_id=${candidate_id}`)
            .then(response => response.json())
            .then(data => {
                modalInstance.show();
                modalElement.addEventListener('shown.bs.modal', () => {
                    renderCharts(
                        data.employerBehaviorAssessment,
                        data.candidateBehaviorAssessment,
                        data.employerValueAssessment,
                        data.candidateValueAssessment
                    );
                }, { once: true });
            })
            .catch(err => console.error('Error loading assessment:', err));
    };

    function renderCharts(empBeh, candBeh, empVal, candVal) {
        if (chartEmployerBehavior) chartEmployerBehavior.destroy();
        if (chartCandidateBehavior) chartCandidateBehavior.destroy();
        if (chartEmployerValues) chartEmployerValues.destroy();
        if (chartCandidateValues) chartCandidateValues.destroy();

        chartEmployerBehavior = new Chart(document.getElementById('chartEmployerBehavior').getContext('2d'), {
            type: 'radar',
            data: {
                labels: Object.keys(empBeh),
                datasets: [{
                    label: 'Employer Behavior',
                    data: Object.values(empBeh),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)'
                }]
            }
        });

        chartCandidateBehavior = new Chart(document.getElementById('chartCandidateBehavior').getContext('2d'), {
            type: 'radar',
            data: {
                labels: Object.keys(candBeh),
                datasets: [{
                    label: 'Candidate Behavior',
                    data: Object.values(candBeh),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)'
                }]
            }
        });

        chartEmployerValues = new Chart(document.getElementById('chartEmployerValues').getContext('2d'), {
            type: 'radar',
            data: {
                labels: Object.keys(empVal),
                datasets: [{
                    label: 'Employer Values',
                    data: Object.values(empVal),
                    backgroundColor: 'rgba(133, 250, 240, 0.2)',
                    borderColor: 'rgb(68, 242, 248)'
                }]
            }
        });

        chartCandidateValues = new Chart(document.getElementById('chartCandidateValues').getContext('2d'), {
            type: 'radar',
            data: {
                labels: Object.keys(candVal),
                datasets: [{
                    label: 'Candidate Values',
                    data: Object.values(candVal),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgb(255, 206, 86)'
                }]
            }
        });

        const alignment = calculateAlignment(empBeh, candBeh, empVal, candVal);
        document.getElementById('alignmentScoreText').innerText = `Alignment Score: ${alignment}%`;
    }

    function calculateAlignment(scores1a, scores1b, scores2a, scores2b) {
        let total = 0;
        let count = 0;

        for (const key in scores1a) {
            total += 100 - Math.abs(scores1a[key] - scores1b[key]);
            count++;
        }

        for (const key in scores2a) {
            total += 100 - Math.abs(scores2a[key] - scores2b[key]);
            count++;
        }

        return Math.round(total / count);
    }
</script>



{{-- <script>
    function showJobDetails(event) {
    const jobCard = event.currentTarget.closest(".job-card");
    const jobId = jobCard.getAttribute("data-job_id");
    const title = jobCard.getAttribute("data-title");
    const location = jobCard.getAttribute("data-location");
    const type = jobCard.getAttribute("data-type");
    const company = jobCard.getAttribute("data-company");
    const experience = jobCard.getAttribute("data-experience");
    const salary = jobCard.getAttribute("data-salary");
    const description = jobCard.getAttribute("data-description");
    const requirements = jobCard.getAttribute("data-requirements");
    const benefits = jobCard.getAttribute("data-benefits");
    const logoImg = jobCard.querySelector("img");
    const logo = logoImg ? logoImg.src : '';

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

     // Inject job ID and title into Apply button
    const applyBtn = document.getElementById("applyBtn");
    applyBtn.setAttribute("data-job_id", jobId);
    applyBtn.setAttribute("data-title", title);

    const modal = new bootstrap.Modal(document.getElementById("job-details-modal"));
    modal.show();
}

</script> --}}

<script>
    function showJobDetails(event) {
    const jobCard = event.currentTarget.closest(".job-card");
    const jobId = jobCard.getAttribute("data-job_id"); // <-- this was missing
    const title = jobCard.getAttribute("data-title");
    const location = jobCard.getAttribute("data-location");
    const type = jobCard.getAttribute("data-type");
    const company = jobCard.getAttribute("data-company");
    const experience = jobCard.getAttribute("data-experience");
    const salary = jobCard.getAttribute("data-salary");
    const description = jobCard.getAttribute("data-description");
    const requirements = jobCard.getAttribute("data-requirements");
    const benefits = jobCard.getAttribute("data-benefits");
    const logoImg = jobCard.querySelector("img");
    const logo = logoImg ? logoImg.src : '';

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

    const applyBtn = document.getElementById("applyBtn");
    applyBtn.setAttribute("data-job_id", jobId);
    applyBtn.setAttribute("data-title", title);

    const modal = new bootstrap.Modal(document.getElementById("job-details-modal"));
    modal.show();
}

</script>
      
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Setup CSRF for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#applyBtn', function () {
        let jobId = $(this).data('job_id');
        let jobTitle = $(this).data('title');
        let candidateId = {{ auth('candidate')->check() ? auth('candidate')->user()->id : 'null' }};
        let candidateName = "{{ auth('candidate')->check() ? auth('candidate')->user()->candidate_name : '' }}";

        if (candidateId === null) {
            alert('Please log in to apply for a job.');
            return;
        }

        $.ajax({
            url: "{{ route('candidate.applyJob') }}",
            method: "POST",
            data: {
                job_post_id: jobId,
                job_title: jobTitle,
                candidate_id: candidateId,
                candidate_name: candidateName
            },
            success: function (response) {
                alert(response.message);
                $('#job-details-modal').modal('hide');
            },
            error: function (xhr) {
                alert('Failed to apply: ' + (xhr.responseJSON.message || 'Unknown error'));
            }
        });
    });
</script>
