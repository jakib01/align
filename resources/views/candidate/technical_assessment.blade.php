@extends('master_layout.candidate_dashboard_master')

@section('technical_assesment')

<main id="main" class="main">
    <div class="d-flex">
        
        <aside class="filter-section" style="width: 35%; padding-right: 65px;">
            <div class="mb-3">
                <input 
                    type="text" 
                    id="search-input" 
                    class="form-control" 
                    placeholder="Search...">
            </div>
    <div class="filters">
    <h5>Filters</h5>
    <div class="d-flex flex-wrap"> 
        <div class="form-check me-3"> 
            <input 
                class="form-check-input" 
                type="checkbox" 
                id="filter-all" 
                checked
            >
            <label class="form-check-label" for="filter-all">
                All
            </label>
        </div>
        <div class="form-check me-3">
            <input 
                class="form-check-input" 
                type="checkbox" 
                id="filter-technical" 
                checked
            >
            <label class="form-check-label" for="filter-technical">
                Technical Skills
            </label>
        </div>
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="checkbox" 
                id="filter-core"
                checked
            >
            <label class="form-check-label" for="filter-core">
                Core Skills
            </label>
        </div>
    </div>
</div>
</aside>
        <div class="vertical-line" style="border-left: 2px solid #ccc; margin: 0 20px;"></div>
        <div class="content-section" style="flex-grow: 1;">
            <div id="core-content" class="skill-content">
                <h3>Core Skills</h3>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Candidate Qualification & Reasoning</h5>
                        <p class="card-text">Test your mathematical and analytical skills. Lorem ipsum consectetur adipiscing, dolor sit amet, consectetur elit. Quisque sit amet accumsan arcu.</p>
                        <div class="d-flex align-items-center">
                        {{-- <button class="btn btn-primary me-2" onclick="startAssessment()">Start</button> --}}
                        <a href="{{route('coreskill.assesment')}}"  class="btn btn-primary me-2">start</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNumerical">Details</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalNumerical" tabindex="-1" aria-labelledby="modalNumericalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNumericalLabel">Numerical Reasoning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Test your ability to understand and solve mathematical and analytical problems. This test includes basic arithmetic, algebra, and data interpretation questions.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                                <div>
                                    <p><strong>John Doe</strong></p>
                                    <p><em>Mathematics and Data Analytics Expert</em></p>
                                    <p>John has over 10 years of experience in the field of data analytics and mathematical problem-solving, having worked with top tech companies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Logical Reasoning</h5>
                        <p class="card-text">Evaluate your ability to think logically and solve problems. Lorem ipsum dolort si amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                        <div class="d-flex align-items-center">
                        <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogical">Details</button>
                    </div>
                </div>
            </div>
</div>
            <div class="modal fade" id="modalLogical" tabindex="-1" aria-labelledby="modalLogicalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLogicalLabel">Logical Reasoning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Jane Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>Jane has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Verbal Reasoning</h5>
                                <p class="card-text">Improve your ability to interpret written material. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVerbal">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal fade" id="modalVerbal" tabindex="-1" aria-labelledby="modalVerbalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalVerbalLabel">Verbal Reasoning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>Smith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Abstract Reasoning</h5>
                                <p class="card-text">Test your ability to think abstractly and solve complex patterns. Lorem ipsum dolor sit amet, consectetur elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAbstract">Details</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal fade" id="modalAbstract" tabindex="-1" aria-labelledby="modalAbstractLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAbstractLabel">Abstract Reasoning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>Smith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Attention to Detail</h5>
                                <p class="card-text">Assess your focus and ability to catch mistakes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDetailLabel">Attention to Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Critical Thinking</h5>
                                <p class="card-text">Enhance your ability to think critically and analyze situations. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCritical">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalCritical" tabindex="-1" aria-labelledby="modalCriticalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCriticalLabel">Critical Thinking</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
</div>
            <div id="technical-content" class="skill-content">
                <h3>Technical Skills</h3>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Python</h5>
                                <p class="card-text">Enhance your Python coding skills. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPython">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalPython" tabindex="-1" aria-labelledby="modalPythonLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPythonLabel">Python</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Java</h5>
                                <p class="card-text">Master Java programming language. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJava">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalJava" tabindex="-1" aria-labelledby="modalJavaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalJavaLabel">Java</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Data Structures</h5>
                                <p class="card-text">Improve problem-solving with data structures. Lorem ipsum dolor sit amet, adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalData">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDataLabel">Data Structures</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Machine Learning</h5>
                                <p class="card-text">Learn the fundamentals of Machine Learning. Lorem ipsum dolor sit amet, adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalML">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalML" tabindex="-1" aria-labelledby="modalMLLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMLLabel">Machine Learning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Web Development</h5>
                                <p class="card-text">Build responsive websites and apps. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalWD">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalWD" tabindex="-1" aria-labelledby="modalWDLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCriticalLabel">Web Development</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Cloud Computing</h5>
                                <p class="card-text">Understand cloud platforms and architectures. Lorem ipsum dolor sit amet, adipiscing elit. Quisque sit amet arcu.</p>
                                <div class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" onclick="startAssessment()">Complete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCC">Details</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="modal fade" id="modalCC" tabindex="-1" aria-labelledby="modalCCLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCCLabel">Cloud Computing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Skill Test Description:</h6>
                            <p>Evaluate your capacity to think logically and tackle complex problems. The test includes puzzles, sequences, and logical pattern recognition.</p>
                            <h6>Subject Matter Expert:</h6>
                            <div class="d-flex align-items-center">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="rounded-circle me-3" alt="Subject Expert Image" style="width: 50px; height: 50px;">
                            <div>
                                    <p><strong>Smith</strong></p>
                                    <p><em>Expert in Cognitive Science and Logic</em></p>
                                    <p>JSmith has a PhD in Cognitive Science and has been consulting for over 15 years in logical reasoning and cognitive problem-solving strategies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                </div>

    <script>
        document.querySelectorAll('.form-check-input').forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                const allContent = document.getElementById('core-content');
                const technicalContent = document.getElementById('technical-content');
                const isAllChecked = document.getElementById('filter-all').checked;
                const isTechnicalChecked = document.getElementById('filter-technical').checked;
                const isCoreChecked = document.getElementById('filter-core').checked;

                if (isAllChecked) {
                    allContent.style.display = 'block';
                    technicalContent.style.display = 'block';
                } else {
                    allContent.style.display = isCoreChecked ? 'block' : 'none';
                    technicalContent.style.display = isTechnicalChecked ? 'block' : 'none';
                }
            });
        });

        // Search functionality
        document.getElementById('search-input').addEventListener('input', (event) => {
            const searchTerm = event.target.value.toLowerCase();
            document.querySelectorAll('.skill-content .card').forEach((card) => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchTerm) ? 'block' : 'none';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</main>


@endsection