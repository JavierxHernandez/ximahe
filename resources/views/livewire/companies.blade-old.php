<div>
    <x-slot name="header">
        <x-header title="Companies" :route="route('companies.create')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 m-4 md:gap-4 md:grid-cols-2 lg:gap-4 lg:grid-cols-4">
                @foreach ($companies as $company)
                    <x-card :company="$company" />
                @endforeach
            </div>
            <div class="m-4">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>


<!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

    <!--Card-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


        <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Name</th>
                    <th data-priority="2">Position</th>
                    <th data-priority="3">Office</th>
                    <th data-priority="4">Age</th>
                    <th data-priority="5">Start date</th>
                    <th data-priority="6">Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>

                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->

                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                </tr>
            </tbody>

        </table>


    </div>
    <!--/Card-->


</div>
<!--/container-->
