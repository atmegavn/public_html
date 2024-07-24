<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
    <script src="/register/iframeResizer.contentWindow.min.js"></script>
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Registration form
            </h1>
            <?php if($_GET['error']) { ?>
            <article class="message is-danger">
                <div class="message-body">
                    <b>Error</b>: <?php echo htmlspecialchars($_GET['error'] ?: 'An unknown error has occurred. '); ?>
                </div>
            </article>
            <?php } ?>
            <form method="post" action="submit.php" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Title <span style="color:red">*</span></label>
                    <div class="control">
                        <div class="select">
                            <select name="title" required>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Mrss">Mrss</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">First Name <span style="color:red">*</span></label>
                            <div class="control">
                                <input class="input" name="first_name" required type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Last Name <span style="color:red">*</span></label>
                            <div class="control">
                                <input class="input" name="last_name" required type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Organization <span style="color:red">*</span></label>
                    <div class="control">
                        <input class="input" name="organization" required type="text" placeholder="">
                    </div>
                    <p class="help">The names of organizations shall be provided in the following format: University, Faculty/Institute, Department. </p>
                </div>
                <div class="field">
                    <label class="label">Address <span style="color:red">*</span></label>
                    <div class="control">
                        <input class="input" name="address" required type="text" placeholder="">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">City <span style="color:red">*</span></label>
                            <div class="control">
                                <input class="input" name="city" required type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Country <span style="color:red">*</span></label>
                            <div class="control">
                                <input class="input" name="country" required type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email <span style="color:red">*</span></label>
                    <div class="control">
                        <input class="input" name="email" required type="email" placeholder="">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Do you agree that your photos can be published on the website of the conference? <span style="color:red">*</span></label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="consent_publish_photos" required checked value="agree">
                            I agree
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="consent_publish_photos" required value="not_agree">
                            I do not agree
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label">I want to participate: <span style="color:red">*</span></label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="wants_presentation" required checked value="with_presentation">
                            With oral or poster presentation
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="wants_presentation" required value="no_presentation">
                            Without presentation
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Please select: <span style="color:red">*</span></label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="fee_category" required checked value="participant">
                            Conference Participant, Regular Fee: 250€ (Until 1st March) or 300€ (After 1st March)
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="fee_category" required value="student">
                            Student/Researcher younger than 35: 160€ (Until 1st March) or 200€ (After 1st March)
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Facultative excursion</label>
                    <label class="checkbox">
                        <input type="checkbox" name="optional_facultative_excursion" value="Visting Boka Kotorska">
                        "Visting Boka Kotorska" (additional to participation) - 60€
                    </label>
                </div>
                <div class="field">
                    <label class="label">Hotel Leotar reservation</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" checked name="hotel_leotar" required checked value="None">
                            None
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="hotel_leotar" required value="Single bed">
                            Single bed - 40 €
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="hotel_leotar" required value="Double room">
                            Double room (guest shares a room with another person) - 35€
                        </label>
                    </div>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="hotel_leotar" required value="Apartment">
                            Apartment (single guest in an apartment or a double room) - 48 € (not available anymore)
                        </label>
                    </div>
                </div>
                <?php /*
                <div class="field">
                    <label class="label">Upload abstract (max 20 MB file): <span style="color:red">*</span></label>
                    <div id="file-with-js" class="file has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" required name="abstract" accept=".doc,.docx,.pdf,.odt,.zip,.rar,.gz,.tar,.7z" />
                            <span class="file-cta">
                                <span class="file-icon"><i class="fa fa-upload"></i></span>
                                <span class="file-label">Select a file...</span>
                            </span>
                            <span class="file-name">No File Selected</span>
                        </label>
                    </div>
                </div> 
                */ ?>
                <div class="field">
                    <label class="label">Remarks</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="" name="remarks"></textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Enter the gift CODE if you received one</label>
                    <div class="control">
                        <input class="input" name="gift_code" type="text" placeholder="">
                    </div>
                </div>
                <div class="h-captcha" data-sitekey="fe084908-dd20-4ed4-86bc-e0d6f886681c"></div>
                <button class="mt-4 button is-primary">Submit</button>
            </form>
            <div class="card mt-6">
                <div class="card-content">
                    <div class="content">
                        Please prepare Abstract using following template: 
                        <br>
                        <a href="https://mme-see.org/doc/abstract_template_mme-see_2025.doc" class="mt-2 button is-primary">Download Template</a>
			<hr> Please register and then upload your manuscript at the following: </br><a class="mt-2 button is-primary" href="https://open-balkan.org/mme-see" target="_blank">LINK</a></br>Our team will take care of the manuscript process review.<hr>
                        Deadline for submission of abstracts: March 1st, 2025. <br>One registration fee covers the printing of two manuscripts. <br>Registration fees will be entitled to a 50 % refund of the amount paid, net of bank charges. Deadline to claim a refund is an April 1st, 2025. Cancellations received after the mentioned deadline will not be eligible for any refund.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /*
    <script>
        var input = document.querySelector("#file-with-js>.file-label>.file-input");
        input.onchange = function () {
            if(input.files.length > 0){
                var fileNameContainer = document.querySelector("#file-with-js>.file-label>.file-name");
                fileNameContainer.textContent = input.files[0].name;
            }
        }
    </script>
    */ ?>
</body>
</html>