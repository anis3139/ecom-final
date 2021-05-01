
<section>
    <form class="mb-0" id="template-contactform" name="template-contactform" action="{{ route('client.contactSend') }}"
        method="post">
        @csrf

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="template-contactform-name">Name <small>*</small></label>
                <input required type="text" id="name" name="name" value=""
                    class="sm-form-control required" />
            </div>

            <div class="col-md-6 form-group">
                <label for="template-contactform-email">Email <small>*</small></label>
                <input type="email" id="email" name="email" value=""
                    class="required email sm-form-control" />
            </div>

            <div class="col-md-6 form-group">
                <label for="template-contactform-phone">Phone</label>
                <input required type="text" id="PhonNumber" name="PhonNumber" value=""
                    class="sm-form-control" />
            </div>



            <div class="col-md-6 form-group">
                <label for="template-contactform-subject">Subject <small>*</small></label>
                <input required type="text" id="subject" name="subject" value=""
                    class="required sm-form-control" />
            </div>


            <div class="w-100"></div>

            <div class="col-12 form-group">
                <label for="template-contactform-message">Message <small>*</small></label>
                <textarea required class="required sm-form-control" id="massage" name="massage"
                    rows="6" cols="30"></textarea>
            </div>


            <div class="col-12 form-group contact">
                <button type="submit" id="contactSubmitBtn" tabindex="5" value="Submit"
                    class="button button-3d m-0 contactSubmitBtnAbout">Submit</button>
            </div>
        </div>

    </form>
</section>
