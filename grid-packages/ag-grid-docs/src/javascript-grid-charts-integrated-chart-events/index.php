<?php
$pageTitle = "Charts: Events";
$pageDescription = "ag-Grid is a feature-rich data grid that can also chart data out of the box. Learn how to chart data directly from inside ag-Grid.";
$pageKeywords = "Javascript Grid Charting";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>

<h1 class="heading-enterprise">Chart Events</h1>

<p class="lead">
    There are several events which are raised at different points in the lifecycle of a chart.
</p>

<h2><code>ChartCreated</code></h2>

<p>
    This event is raised whenever a chart is first created.
</p>

<snippet language="ts">
interface ChartCreated {
    type: string; // 'chartCreated'
    chartId: string;
    chartModel: ChartModel;
    api: GridApi;
    columnApi: ColumnApi;
}
</snippet>

<h2><code>ChartRangeSelectionChanged</code></h2>

<p>
    This is raised any time that the data range used to render the chart from is changed, e.g. by using the range selection handle or
    by making changes in the Data tab of the configuration sidebar. This event contains a <code>cellRange</code> object that gives you
    information about the range, allowing you to recreate the chart.
</p>

<snippet language="ts">
interface ChartRangeSelectionChanged {
    type: string; // 'chartRangeSelectionChanged'
    id: string;
    chartId: string;
    cellRange: CellRangeParams;
    api: GridApi;
    columnApi: ColumnApi;
}

interface CellRangeParams {
    // start row
    rowStartIndex?: number;
    rowStartPinned?: string;

    // end row
    rowEndIndex?: number;
    rowEndPinned?: string;

    // columns
    columns: (string | Column)[];
}
</snippet>

<h2><code>ChartOptionsChanged</code></h2>

<p>
    Formatting changes made by users through the Format Panel will raise the <code>ChartOptionsChanged</code> event:
</p>

<snippet language="ts">
interface ChartOptionsChanged {
    type: string; // 'chartOptionsChanged'
    chartId: string;
    chartType: ChartType;
    chartPalette: string;
    chartOptions: ChartOptions;
    api: GridApi;
    columnApi: ColumnApi;
}

type ChartType =
    'groupedColumn' |
    'stackedColumn' |
    'normalizedColumn' |
    'groupedBar' |
    'stackedBar' |
    'normalizedBar' |
    'line' |
    'scatter' |
    'bubble' |
    'pie' |
    'doughnut' |
    'area' |
    'stackedArea' |
    'normalizedArea';
</snippet>

<p>
    Here the <code>chartPalette</code> will be set to the name of the currently selected palette, which will be one of the following:
    <code>'borneo', 'material', 'pastel', 'bright', 'flat'</code>
</p>

<h2><code>ChartDestroyed</code></h2>

<p>This is raised when a chart is destroyed.</p>

<snippet language="ts">
interface ChartDestroyed {
    type: string; // 'chartDestroyed'
    chartId: string;
    api: GridApi;
    columnApi: ColumnApi;
}
</snippet>

<h2>Example: Chart Events</h2>

<p>The following example demonstrates when the described events occur by writing to the console whenever they are triggered. Try the following:</p>

<ul>
    <li>
        Create a chart from selection, for example, select a few cells in the "Month" and "Sunshine" columns and right-click to "Chart Range" as a "Line" chart.
        Notice that a "Created chart with ID id-xxxxxxxxxxxxx" message has been logged to the console.
    </li>
    <li>
        Shrink or expand the selection by a few cells to see the "Changed range selection of chart with ID id-xxxxxxxxxxxx" logged.
    </li>
    <li>
        Click the hamburger icon inside the chart dialog to show chart settings and switch to a column chart.
        Notice that a "Changed options of chart with ID id-xxxxxxxxxxxxx" message has been logged to the console.
    </li>
    <li>
        Close the chart dialog to see the "Destroyed chart with ID id-xxxxxxxxxxx" message logged.
    </li>
</ul>

<?= grid_example('Events', 'events', 'generated', ['enterprise' => true]) ?>

<h2>Other Resources</h2>

<p>
    To learn about series events refer to the standalone charting library <a href="../javascript-charts-events/">documentation</a>.
</p>

<h2>Next Up</h2>

<p>
    Continue to the next section to learn about the: <a href="../javascript-grid-charts-integrated-container/">Chart Container</a>.
</p>

<?php include '../documentation-main/documentation_footer.php'; ?>
