<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('lib/jquery.sparkline.js') }}"></script>
<!--common script for all pages-->
<script src="{{ asset('lib/common-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/gritter-conf.js') }}"></script>
<!--script for this page-->
@yield('js-additional')
@include('layouts.sweet-alert-notification')
<script type="application/javascript">

    $('#data-table').dataTable();

    $(function () {
        $("[data-tooltip='tooltip']").tooltip();
    });

    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        // $("#my-calendar").zabuto_calendar({
        //     action: function() {
        //         return myDateFunction(this.id, false);
        //     },
        //     action_nav: function() {
        //         return myNavFunction(this.id);
        //     },
        //     ajax: {
        //         url: "show_data.php?action=1",
        //         modal: true
        //     },
        //     legend: [{
        //         type: "text",
        //         label: "Special event",
        //         badge: "00"
        //     },
        //     {
        //         type: "block",
        //         label: "Regular event",
        //     }
        //     ]
        // });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }

</script>
