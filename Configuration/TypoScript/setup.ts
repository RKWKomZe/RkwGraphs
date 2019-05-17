
plugin.tx_rkwgraphs {
  view {
    templateRootPaths.0 = EXT:rkw_graphs/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_rkwgraphs.view.templateRootPath}
    partialRootPaths.0 = EXT:rkw_graphs/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_rkwgraphs.view.partialRootPath}
    layoutRootPaths.0 = EXT:rkw_graphs/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_rkwgraphs.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_rkwgraphs.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  settings {
    title = {$plugin.tx_rkwgraphs.settings.title}
    xaxis {
      label = {$plugin.tx_rkwgraphs.settings.xaxis.label}
    }
    yaxis {
      label ={$plugin.tx_rkwgraphs.settings.yaxis.label}
    }
    colors = {$plugin.tx_rkwgraphs.settings.colors}
    labels = {$plugin.tx_rkwgraphs.settings.labels}
    series = {$plugin.tx_rkwgraphs.settings.series}
    unit = {$plugin.tx_rkwgraphs.settings.unit}
    caption = {$plugin.tx_rkwgraphs.settings.caption}
    donut = {$plugin.tx_rkwgraphs.settings.donut}
    bars {
      yaxis2 {
        show = {$plugin.tx_rkwgraphs.settings.bars.yaxis2.show}
        label = {$plugin.tx_rkwgraphs.settings.bars.yaxis2.label}
      }
      stacked = {$plugin.tx_rkwgraphs.settings.bars.stacked}
      horizontal = {$plugin.tx_rkwgraphs.settings.bars.horizontal}
      offsetX = {$plugin.tx_rkwgraphs.settings.bars.offsetX}
      dataLabels {
        offsetX = {$plugin.tx_rkwgraphs.settings.bars.dataLabels.offsetX}
        offsetY = {$plugin.tx_rkwgraphs.settings.bars.dataLabels.offsetY}
        style {
          colors = {$plugin.tx_rkwgraphs.settings.bars.dataLabels.style.colors}
        }
      }
    }
    candlesticks {
      series = TEXT
      series.value (
      {$plugin.tx_rkwgraphs.settings.candlesticks.series.value}
      )
    }
    legend {
      show = {$plugin.tx_rkwgraphs.settings.legend.show}
    }
  }
}


// include JS
page.includeJSFooterlibs.txRkwGraphsApexCharts = EXT:rkw_graphs/Resources/Public/Js/ApexCharts-v3.6.2.js
page.includeCSS.txRkwGraphsCharts = EXT:rkw_graphs/Resources/Public/Css/Charts.css


plugin.tx_rkwgraphs._CSS_DEFAULT_STYLE (

)
