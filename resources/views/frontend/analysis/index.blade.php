<x-guest-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6 flex justify-center items-center">
                    <span class="text-2xl font-bold">Data Analysis</span>
                </div>
                <div class="flex justify-around my-2 items-center">
                    <div class="border p-4">
                        <span class="text-xl font-bold">Roles & Permissions Analysis BarChart</span>
                    </div>
                    <div class="border p-4">
                        <span class="text-xl font-bold">User & Roles Analysis PieChart</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="border p-4 flex justify-center items-center w-auto">
                            <div class="w-[800px] h-auto m-auto">
                                @php
                                    $chartLabels = [];
                                    $chartData = [];

                                    foreach ($permissions as $perm) {
                                        $chartLabels[] = $perm->name;
                                        $chartData[] = $perm->roles->count();
                                    }
                                @endphp
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="border p-4 flex justify-center items-center w-auto">
                            <div class="w-[450px] h-auto m-auto">
                                @php
                                    $roleCounts = [];

                                    foreach ($users as $user) {
                                        foreach ($user->roles as $userRole) {
                                            $roleName = $userRole->name;
                                            if (!isset($roleCounts[$roleName])) {
                                                $roleCounts[$roleName] = 1;
                                            } else {
                                                $roleCounts[$roleName]++;
                                            }
                                        }
                                    }

                                    arsort($roleCounts);

                                    $chartLabels2 = array_keys($roleCounts);
                                    $chartData2 = array_values($roleCounts);

                                @endphp
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $startTime = session('start_time');
                    $endTime = now();
                    $totalTime = $startTime->diff($endTime);
                @endphp
                <div class="flex justify-center mt-8">
                    <span class="border border-gray-200 w-[30rem] p-5 flex justify-center items-center text-2xl font-bold">
                        Total Session Time: {{ $totalTime->format('%H : %I ') }}
                    </span>
                </div>
                <div class="flex justify-center my-5 items-center">
                    <div class="border p-4">
                        <span class="text-xl font-bold">Tasks Completion</span>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <div class="w-[450px] h-auto m-auto">
                        @php
                            $chartLabels3 = json_encode(['Completed', 'Remaining']);
                            $chartData3 = json_encode([
                                $tasks->where('completion', true)->count(),
                                $tasks->where('completion', false)->count(),
                            ]);
                        @endphp
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.chartData = {
            labels: @json($chartLabels),
            data: @json($chartData)
        };

        const chartLabels = window.chartData.labels;
        const chartData = window.chartData.data;

        const data = {
            labels: chartLabels,
            datasets: [{
                label: 'Roles',
                data: chartData,
                backgroundColor: 'lightblue',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        new Chart(
            document.getElementById('myChart'),
            config
        );


        window.chartData2 = {
            labels: @json($chartLabels2),
            data: @json($chartData2)
        };

        const chartLabels2 = window.chartData2.labels;
        const chartData2 = window.chartData2.data;

        const data2 = {
            labels: chartLabels2,
            datasets: [{
                label: 'Roles',
                data: chartData2,
                backgroundColor: ['lightblue','lightpink','lightgreen','rgba(222, 196, 255, 0.8)','rgba(255, 255, 196, 0.8)'],
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        };

        const config2 = {
            type: 'pie',
            data: data2,
            options: {}
        };

        new Chart(
            document.getElementById('myChart2'),
            config2
        );

        document.addEventListener('DOMContentLoaded', function() {
        const chartLabels3 = JSON.parse('{!! $chartLabels3 !!}');
        const chartData3 = JSON.parse('{!! $chartData3 !!}');

        const data3 = {
            labels: chartLabels3,
            datasets: [{
                label: 'Roles',
                data: chartData3,
                backgroundColor: ['rgb(122, 255, 147)', 'lightpink'],
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        };

        const config3 = {
            type: 'pie',
            data: data3,
            options: {}
        };

        new Chart(
            document.getElementById('myChart3'),
            config3
        );
    });
    </script>
</x-guest-layout>
