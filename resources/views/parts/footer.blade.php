<!-- Footer -->
<footer class="page-footer">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <ul class="list-inline mb-0">

            <li class="list-inline-item">
                © <?php echo date("Y"); ?> {{ config('app.name') }}
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="https://github.com/eduayme/RescueApp/releases/tag/v1.3.1" target="_blank">
                    v1.3.1
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="https://github.com/eduayme/RescueApp" target="_blank">
                    <span class="octicon octicon-mark-github"></span>
                    {{ __('footer.open_source') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="/docs" id="docs">
                    {{ __('footer.documentation') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="{{ URL::to('privacy') }}">
                    {{ __('footer.privacy_policy') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="{{ URL::to('service') }}">
                    {{ __('footer.terms_of_service') }}
                </a>
            </li>

        </ul>
    </div>

</footer>

<script>
   var lang = '{{ Lang::locale() }}';
   document.getElementById("docs").setAttribute("href", "/docs/" + lang.toUpperCase());
</script>
