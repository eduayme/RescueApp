<!-- Footer -->
<footer class="page-footer">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <ul class="list-inline mb-0">

            <li class="list-inline-item">
                © <?php echo date("Y"); ?> {{ config('app.name', 'Aplicatiu de Recerques') }}
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                v1.0
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="https://github.com/eduayme/Aplicatiu-de-Recerques" target="_blank">
                    <span class="octicon octicon-mark-github"></span>
                    {{ __('main.open_source') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="{{ URL::to('privacy') }}">
                    {{ __('main.privacy_policy') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="{{ URL::to('service') }}">
                    {{ __('main.terms_of_service') }}
                </a>
            </li>

        </ul>
    </div>

</footer>
