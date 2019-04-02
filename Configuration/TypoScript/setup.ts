
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
    donut {
    }
    bars {
      colors = '#000000'
      labels = 'gut|mittel|schlecht'
      series = '10|15|20'
      stacked = false
      horizontal = false
    }
  }
}


// include JS
page.includeJSFooterlibs.txRkwGraphsApexCharts  = EXT:rkw_graphs/Resources/Public/Js/ApexCharts-v3.2.2.min.js
page.includeCSS.txRkwGraphsCharts  = EXT:rkw_graphs/Resources/Public/Css/Charts.css


plugin.tx_rkwgraphs._CSS_DEFAULT_STYLE (

)
