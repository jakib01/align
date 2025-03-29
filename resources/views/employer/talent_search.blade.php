@extends('master_layout.employer_dashboard_master')
@section('applicant_tracking')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Talent Search</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid p-4" id="main-content">
        <div id="team-page-content" style="display: none;"></div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="applicant-filters">
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="form-control" placeholder="Enter location">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="salary">Salary</label>
                                <input type="text" id="salary" class="form-control" placeholder="Enter salary">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="seniority">Seniority</label>
                                <input type="text" id="seniority" class="form-control" placeholder="Enter seniority">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="pattern">Working Pattern</label>
                                <input type="text" id="pattern" class="form-control"
                                    placeholder="Enter working pattern">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="hours">Hours</label>
                                <input type="text" id="hours" class="form-control" placeholder="Enter hours">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="industry">Industry</label>
                                <input type="text" id="industry" class="form-control" placeholder="Enter industry">
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="skills1">Skills 1</label>
                                <select id="skills1" class="form-control">
                                    <option value="">Select Skill 1</option>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="skills2">Skills 2</label>
                                <select id="skills2" class="form-control">
                                    <option value="">Select Skill 2</option>

                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="skills3">Skills 3</label>
                                <select id="skills3" class="form-control">
                                    <option value="">Select Skill 3</option>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="sponsorship">Sponsorship</label>
                                <select id="sponsorship" class="form-control">
                                    <option value="">Select Sponsorship</option>
                                    <option value="yes">Required</option>
                                    <option value="no">Not Required</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="btn-search text-center mt-3">
                        <button class="btn btn-primary" onclick="searchJobs()">
                            <i class="fas fa-search search-icon"></i> Keyword
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <h1 class="my-4">Candidates</h1>
            <table class="table table-bordered" id="candidates-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>Skills 1</th>
                        <th>Skills 2</th>
                        <th>Skills 3</th>
                        <th>Values Match</th>
                    </tr>
                </thead>
                <tbody id="candidates-body">
                    <tr>
                        <td>John Doe</td>
                        <td>London</td>
                        <td>80000</td>
                        <td>88%</td>
                        <td>76%</td>
                        <td>91%</td>
                        <td>76%</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>Liverpool</td>
                        <td>90000</td>
                        <td>60%</td>
                        <td>54%</td>
                        <td>87%</td>
                        <td>62%</td>
                    </tr>
                    <tr>
                        <td>Emily Johnson</td>
                        <td>Scotland</td>
                        <td>75000</td>
                        <td>65%</td>
                        <td>70%</td>
                        <td>89%</td>
                        <td>65%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="searched-jobs">
        <div class="searched-bar">
            <div class="searched-show">1000 Candidates displaying...</div>

        </div>
</main>

<script>
    function searchJobs() {

        const locationFilter = document.getElementById("location").value.toLowerCase();
        const salaryFilter = document.getElementById("salary").value.toLowerCase();
        const skills1Filter = document.getElementById("skills1").value.toLowerCase();
        const skills2Filter = document.getElementById("skills2").value.toLowerCase();
        const skills3Filter = document.getElementById("skills3").value.toLowerCase();

        const tableBody = document.getElementById("candidates-body");
        const rows = tableBody.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const name = row.cells[0].textContent.toLowerCase();
            const location = row.cells[1].textContent.toLowerCase();
            const salary = row.cells[2].textContent.toLowerCase();
            const skills1 = row.cells[3].textContent.toLowerCase();
            const skills2 = row.cells[4].textContent.toLowerCase();
            const skills3 = row.cells[5].textContent.toLowerCase();
            const valuesMatch = row.cells[6].textContent.toLowerCase();

            const matchesLocation = location.includes(locationFilter);
            const matchesSalary = salary.includes(salaryFilter);
            const matchesSkills1 = skills1.includes(skills1Filter);
            const matchesSkills2 = skills2.includes(skills2Filter);
            const matchesSkills3 = skills3.includes(skills3Filter);


            const matchesAll =
                (locationFilter === '' || matchesLocation) &&
                (salaryFilter === '' || matchesSalary) &&
                (skills1Filter === '' || matchesSkills1) &&
                (skills2Filter === '' || matchesSkills2) &&
                (skills3Filter === '' || matchesSkills3);

            row.style.display = matchesAll ? "" : "none";
        }
    }
    async function fetchSkills() {
        try {
            const response = await fetch('/api/skills');
            const skills = await response.json();

            populateSkillDropdowns(skills);
        } catch (error) {
            console.error('Error fetching skills:', error);
        }
    }

    function populateSkillDropdowns(skills) {
        const skill1Select = document.getElementById('skills1');
        const skill2Select = document.getElementById('skills2');
        const skill3Select = document.getElementById('skills3');

        skills.forEach(skill => {
            const option = document.createElement('option');
            option.value = skill.id;
            option.textContent = skill.name;

            skill1Select.appendChild(option.cloneNode(true));
            skill2Select.appendChild(option.cloneNode(true));
            skill3Select.appendChild(option.cloneNode(true));
        });
    }

    document.addEventListener('DOMContentLoaded', fetchSkills);
</script>

@endsection