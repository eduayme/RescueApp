<!-- Footer -->
<footer class="page-footer margin-top">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <ul class="list-inline">

            <li class="list-inline-item">
              © <?php echo date("Y"); ?> {{ config('app.name', 'Aplicatiu de Recerques') }}
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
              v1.0
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="https://github.com/eduayme/Aplicatiu-de-Recerques">
                    <span class="octicon octicon-mark-github"></span>
                    {{ __('main.open_source') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="#">
                    {{ __('main.privacy_policy') }}
                </a>
            </li>

            <li class="list-inline-item"> | </li>

            <li class="list-inline-item">
                <a href="#">
                    {{ __('main.terms_of_service') }}
                </a>
            </li>

        </ul>
    </div>

</footer>
