package org.senior.project.dto.fiu.edu;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class PantherUserInfo {

	private String email;
	private String id;
	private String firstName ;
	private String lastName; 
	private String middle; 
	private boolean valid ; 
	private String projectTitle ;
        private String projectID;
	
	
	
	public PantherUserInfo(boolean valid ) {		
		this.valid = valid;
	}
	public PantherUserInfo(){
		
	}
	
	public PantherUserInfo(String email, String id ,  String firstName , String middleName , String lastName, String projectId, String projectTitle) {		
		this.email = email;
		this.id = id;
		this.firstName = firstName ;
		this.middle = middleName; 
		this.lastName = lastName ; 
		this.valid = true;
                this.projectID = projectId;
                this.projectTitle = projectTitle;
		
	}

    public String getProjectID() {
        return projectID;
    }

    public void setProjectID(String projectID) {
        this.projectID = projectID;
    }
	
	public String getMiddle() {
		return middle;
	}

	public void setMiddle(String middle) {
		this.middle = middle;
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public String getEmail() {
		return email;
	}	
	
	public void setEmail(String email) {
		this.email = email;
	}
	
	public String getId() {
		return id;
	}
	
	public void setId(String id) {
		this.id = id;
	}
	public boolean isValid() {
		return valid;
	}

	public void setValid(boolean valid) {
		this.valid = valid;
	}
	public String getProjectTitle() {
		return projectTitle;
	}
	public void setProjectTitle(String projectTitle) {
		this.projectTitle = projectTitle;
	}
	

}



