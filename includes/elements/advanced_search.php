  <!--begin::Preferences-->
  <form data-kt-search-element="advanced-options-form" class="pt-1 d-none" action="../v3/search" method="POST">
  <input name="search" type="hidden" />
      <!--begin::Heading-->
      <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
      <!--end::Heading-->
      <!--begin::Input group-->
      <div class="mb-5">
          <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the words" name="query_inc" />
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Exclude the words" name="query_exc" />
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <input type="text" name="reply_to" class="form-control form-control-sm form-control-solid" placeholder="In reply to: (username)" value="" />
      </div>
      <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-5">
          <input type="text" name="from" class="form-control form-control-sm form-control-solid" placeholder="Tweet from: (username)" value="" />
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Filter out" name="filter_out[]" data-allow-clear="true" multiple="multiple">
              <option></option>
              <option value="media">Media</option>
              <option value="retweets">Retweets</option>
              <option value="native_video">Native video</option>
              <option value="periscope">Periscope</option>
              <option value="vine">Vine</option>
              <option value="images">Images Links</option>
              <option value="twimg">Twimg</option>
              <option value="links">Links</option>
          </select>
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <!--begin::Radio group-->
          <div class="nav-group nav-group-fluid">
              <!--begin::Option-->
              <label>
                  <input type="radio" class="btn-check" name="attitude" value="1" />
                  <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Positive</span>
              </label>
              <!--end::Option-->
              <!--begin::Option-->
              <label>
                  <input type="radio" class="btn-check" name="attitude" value="0" />
                  <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Negative</span>
              </label>
              <!--end::Option-->
          </div>
          <!--end::Radio group-->
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <input type="text" name="url" class="form-control form-control-sm form-control-solid" placeholder="Contains URL from:" value="" />
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
          <!--begin::Radio group-->
          <div class="nav-group nav-group-fluid">
              <!--begin::Option-->
              <label>
                  <input type="radio" class="btn-check" name="sensitivity" value="1" />
                  <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Sensitive</span>
              </label>
              <!--end::Option-->
              <!--begin::Option-->
              <label>
                  <input type="radio" class="btn-check" name="sensitivity" value="0" />
                  <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Insensitive</span>
              </label>
              <!--end::Option-->
          </div>
          <!--end::Radio group-->
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-5">
        <?php
        $t_date = date("d");
        $t_month = date("m");
        $t_year = date("Y");

        $t_date_1 = $t_date - 1;
        $t_date_2 = $t_date + 1;

        $s_date = $t_date_1.'/'.$t_month.'/'.$t_year.' - '.$t_date_2.'/'.$t_month.'/'.$t_year

        ?>
          <input class="form-control form-control-solid" name="date_range" value="<?php echo $s_date ?>" placeholder="Pick tweet date rage" id="kt_daterangepicker_1" readonly />
      </div>
      <!--end::Input group-->
      <!--begin::Actions-->
      <div class="d-flex justify-content-end">
          <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
          <button type="submit" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</button>
      </div>
      <!--end::Actions-->
  </form>
  <!--end::Preferences-->