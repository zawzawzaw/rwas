<template>
    <article id="account-dashboard-section">
    <div class="container-fluid has-breakpoint">

      <div class="row">
        <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

          <div id="account-dashboard-content">
            <div class="default-copy">



              <div class="row">
                <div class="col-md-6">

                  <!-- parsed account-dashboard-name-span in JS -->
                  <template v-if="$root.result===''">
                    <p>
                      Booking success<br/>
                      Thank you for using RWAS!
                    </p>
                  </template>
                  <template v-else>
                    <div class="space100"></div>
                    <pre>
                      {{ $root.result }}
                    </pre>
                  </template>
                </div>
              </div>
            </div>
          </div> <!-- account-dashboard-content -->

          <div class="space100"></div>
          

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>
</template>

<script>
    export default {
        mounted() {
            console.log("Booking successful");
        }
    }
</script>