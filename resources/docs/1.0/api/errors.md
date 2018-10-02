# Errors

Out API uses conventional HTTP response codes to indicate the success or failure of an API request. The table below contains a summary of the typical response codes.

---

- [Codes](#codes)

<a name="codes"></a>
## Codes

|Code|Description|
|:-|:-|
|200|Everything is ok.|
|201|Resources has been created.|
|204|Resources has been deleted.|
|400|Valid data was given but the request has failed.|
|401|No valid API Key was given.|
|403|Not authorized action.|
|404|The request resource could not be found.|
|422|The payload has missing required parameters or invalid data was given.|
|429|Too many attempts.|
|500|Request failed due to an internal error in the server.|
|503|Server is offline for maintenance.|