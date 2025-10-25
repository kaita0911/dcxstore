<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="vn">
  <meta name="DC.Coverage" content="Vietnam">
  <meta name="robots" content="INDEX, FOLLOW, NOODP">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="canonical" href="{$path_url}{$smarty.server.REQUEST_URI}">
  <meta name="geo.region" content="Vietnam">
  <meta name="geo.placename" content="Vietnam">
  <meta property="og:type" content="website">
  {if $is_home eq 1}
  <title>{$seo.name_vn}</title>
  <meta name="keywords" content="{$seo.keyword}">
  <meta name="description" content="{$seo.desc}">
  <meta itemprop="image" content="{$path_url}/{$logoHome.img_thumb_vn}">
  <meta itemprop="description" content="{$seo.desc}">
  <meta itemprop="keywords" content="{$seo.keyword}">
  <meta property="og:title" content="{$seo.name_vn}">
  <meta property="og:site_name" content="{$seo.name_vn}">
  <meta property="og:description" content="{$seo.desc}">
  <meta property="og:url" content="{$path_url}{$smarty.server.REQUEST_URI}">
  <meta property="og:image" content="{$path_url}/{$logoHome.img_thumb_vn}">
  {else}
  <title>{$c_ttl}</title>
  <meta name="keywords" content="{$seo.keyword}">
  <meta name="description" content="{$seo.des}">
  <meta itemprop="image" content="{$path_url}/{$logoHome.img_thumb_vn}">
  <meta itemprop="description" content="{$seo.des}">
  <meta itemprop="keywords" content="{$seo.keyword}">
  <meta property="og:title" content="{$seo.name}">
  <meta property="og:site_name" content="{$seo.name}">
  <meta property="og:description" content="{$seo.des}">
  <meta property="og:url" content="{$path_url}{$smarty.server.REQUEST_URI}">
  <meta property="og:image" content="{$path_url}/{$logoHome.img_thumb_vn}">

  {/if}
  <link rel="shortcut icon" href="{$path_url}/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="{$path_url}/assets/css/style.css">
  <link rel="stylesheet" href="{$path_url}/assets/css/{$page_flag}.css">
</head>