<?php
$userID = JFactory::getUser()->id;

// Get a db connection.
$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query
	->select($db->quoteName(['title']))
	->from($db->quoteName('#__content'))
	->where($db->quoteName('created_by') . ' LIKE ' . $userID);

// Reset the query using our newly populated query object.
$db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

?>


<table class="uk-table uk-table-striped" id="myTable">
	<thead>
	</thead>
	<tbody>
		<?php foreach ($results as $item) : ?>
			<tr>
				<td><strong><?= $item->title ?></strong></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>