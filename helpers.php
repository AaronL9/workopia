<?php

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view
 *
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
  $viewPath = basePath("App/views/{$name}.view.php");

  if (!file_exists($viewPath)) {
    echo "View '{$name} not found'";
    return;
  }

  extract($data);
  require $viewPath;
}

/**
 * Load a partial
 *
 * @param string $name
 * @return void
 */
function loadPartial($name)
{

  $partialPath = basePath("App/views/partials/{$name}.php");

  if (!file_exists($partialPath)) {
    echo "View '{$name} not found'";
    return;
  }

  require $partialPath;
}

/**
 * Inspect a value(s)
 *
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

/**
 * Inspect a value(s) and die
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

/**
 * Format salary
 * 
 * @param string $salary
 * @return string Formatted Salary
 */
function formatSalary($salary)
{
  return '$' . number_format(floatval($salary));
}
